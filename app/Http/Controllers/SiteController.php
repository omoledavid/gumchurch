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
        return view('pages.sermons.index', compact('pageName'));
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
        return view('pages.blogs.index', compact('pageName'));
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
}
