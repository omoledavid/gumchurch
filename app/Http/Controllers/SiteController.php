<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Post;
use App\Models\Sermon;
use App\Models\Testimony;
use Firefly\FilamentBlog\Enums\PostStatus;
use Firefly\FilamentBlog\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        $pageName = 'Home';

        // Fetching events
        $events = Event::latest()->get();

        // Fetching published sermons
        $sermons = Sermon::where('status', 'published')->latest()->get();

        // Fetching the latest main post, if available
        $mainPost = Post::where('status', PostStatus::PUBLISHED)->latest()->first();

        // If there's a main post, exclude it from the posts list, otherwise fetch all posts
        $postsQuery = Post::where('status', PostStatus::PUBLISHED)->latest();

        if ($mainPost) {
            $postsQuery->where('id', '!=', $mainPost->id);
        }

        $posts = $postsQuery->limit(4)->get();

        // Fetching latest testimonies
        $testimonies = Testimony::latest()->get();

        return view('home', compact('pageName', 'events', 'sermons', 'mainPost', 'posts', 'testimonies'));
    }

    public function about(): View
    {
        $pageName = 'About Us';
        return view('pages.about', compact('pageName'));
    }
    public function contact(): View
    {
        $pageName = 'Contact';
        return view('pages.contact', compact('pageName'));
    }
    public function events(): View
    {
        $pageName = 'Upcoming Events';
        $events = Event::query()->latest()->paginate(10);
        return view('pages.events.index', compact('pageName','events'));
    }
    public function showEvents($slug): View
    {
        $event = Event::query()->where('slug', $slug)->first();
        $pageName = 'Events - ' . $event->title;
        return view('pages.events.show', compact('pageName', 'event'));
    }
    public function sermons(): View
    {
        $pageName = 'Sermons';
        $sermons = Sermon::query()->latest()->paginate(10);
        return view('pages.sermons.index', compact('pageName','sermons'));
    }
    public function showSermon($slug): View
    {
        $sermon = Sermon::query()->where('slug', $slug)->first();
        $pageName = 'Sermon - ' . $sermon->title;
        $otherSermons = Sermon::query()->where('id', '!=', $sermon->id)->latest()->limit(10)->get();
        return view('pages.sermons.show', compact('pageName', 'sermon', 'otherSermons'));
    }
    public function blogs(): View
    {
        $pageName = 'Insights ';
        // Fetching the latest main post, if available
        $mainPost = Post::where('status', PostStatus::PUBLISHED)->latest()->first();

        // If there's a main post, exclude it from the posts list, otherwise fetch all posts
        $postsQuery = Post::where('status', PostStatus::PUBLISHED)->latest();

        if ($mainPost) {
            $postsQuery->where('id', '!=', $mainPost->id);
        }
        $categories = Category::query()->whereHas('posts')->latest()->get();

        $posts = $postsQuery->paginate(6);
        return view('pages.blogs.index', compact('pageName','posts','mainPost','categories'));
    }
    public function viewPost($slug): View
    {
        $post = Post::query()->where('slug', $slug)->firstOrFail();
        $pageName = $post->title;

        $categories = Category::query()->withCount('posts')->orderByDesc('posts_count')->get();

        // Get related posts based on shared categories (excluding the current post)
        $relatedPosts = Post::whereHas('categories', function ($query) use ($post) {
            $query->whereIn(
                config('filamentblog.tables.prefix') . 'categories.id',  // Correctly prefixed table name
                $post->categories->pluck('id')
            );
        })
            ->where('id', '!=', $post->id) // Exclude the current post
            ->with(['categories', 'user'])
            ->limit(5)
            ->get();


        $post->load([
            'user',
            'categories',
            'tags',
            'comments' => fn($query) => $query->approved(),
            'comments.user'
        ]);


        return view('pages.blogs.show', compact('pageName', 'post', 'categories', 'relatedPosts'));
    }
    public function ourPastor(): View
    {
        $pageName = 'Our Pastor';
        return view('pages.pastor', compact('pageName'));
    }
    public function formSubmit(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'message' => 'required|string|max:5000',
        // ]);

        // Handle the form submission logic here
        // For example, you can save the data to the database or send an email

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    public function categoryPost($slug): View
    {
        $category = Category::query()->where('slug', $slug)->firstOrFail();
        $pageName = 'Category - ' . $category->name;
        $categories = Category::query()->whereHas('posts')->latest()->get();

        // Fetch posts related to the category
        $posts = Post::query()
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('fblog_categories.id', $category->id);
            })
            ->where('status', PostStatus::PUBLISHED)
            ->latest()
            ->paginate(6);

        return view('pages.blogs.category-posts', compact('pageName', 'posts', 'category', 'categories'));
    }
}
