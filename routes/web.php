<?php

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;
use Yaro\Jarboe\Facades\Jarboe;


Route::group(Jarboe::routeGroupOptions(), function () {
    Jarboe::crud('posts', PostsController::class);
    Jarboe::crud('categories', CategoriesController::class);
});

Route::get('/', function () {
    $recentPosts = \App\Models\Post::with('category')->orderBy('sort_weight')->limit(6)->get();

    return view('home.index', compact('recentPosts'));
});

Route::get('{category}', function (\App\Models\Category $category) {
    $posts = $category->posts()->published()->paginate(6);

    return view('blog.category', compact('category', 'posts'));
})->name('category');

Route::get('{category}/{post}', function (\App\Models\Category $category, \App\Models\Post $post) {
    if (!$post->is_published) {
        abort(404);
    }

    return view('blog.post', compact('category', 'post'));
})->name('post');
