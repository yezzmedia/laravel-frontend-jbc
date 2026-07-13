<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use YezzMedia\FrontendJbc\Models\Post;

class BlogController
{
    public function index(): View
    {
        $project = view()->shared('project');

        $posts = Post::query()
            ->forProject($project->id)
            ->published()
            ->latest('published_at')
            ->paginate(config('frontend-jbc.blog.posts_per_page', 25));

        $randomPosts = Post::query()
            ->forProject($project->id)
            ->published()
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('frontend-jbc::blog.index', [
            'posts' => $posts,
            'randomPosts' => $randomPosts,
        ]);
    }

    public function show(Post $post): View
    {
        abort_unless($post->isPublished(), 404);

        return view('frontend-jbc::blog.show', [
            'post' => $post,
        ]);
    }
}
