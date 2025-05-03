<?php

use App\Http\Controllers\MidnightPrayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about-us', 'about')->name('about-us');
    Route::get('/contact-us', 'contact')->name('contact-us');
    Route::get('events', 'events')->name('events');
    Route::get('events/{slug}', 'showEvents')->name('events.show');
    Route::get('sermons', 'sermons')->name('sermons');
    Route::get('sermons/{slug}', 'showSermon')->name('sermons.show');
    Route::get('blogs', 'blogs')->name('blogs');
    Route::get('post/{slug}', 'viewPost')->name('post.show');
    Route::get('our-pastor', 'ourPastor')->name('our-pastor');
});
Route::controller(MidnightPrayerController::class)->group(function () {
    Route::get('midnight-prayers', 'index')->name('midnight-prayers');
    Route::get('midnight-prayers/{id}/play', 'play')->name('midnight-prayer.play');
    Route::get('midnight-prayer/{id}', 'show')->name('midnight-prayer.show');
    Route::get('midnight-prayer/{id}/download', 'download')->name('midnight-prayer.download');
});

require __DIR__.'/auth.php';
