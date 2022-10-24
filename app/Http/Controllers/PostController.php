<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{

//    User Partition
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $posts = Post::latest()->paginate(10);
        return Inertia::render('Users/Dashboard', compact('posts'));
    }

    public function show(Post $post): Response
    {
        $post = str_replace('%20', ' ', $post);
        $movie = Post::first();
        return Inertia::render('Users/Movie', compact('movie'));
    }



    //    Admin Partition
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexAdmin(): Response
    {
        $posts = Post::latest()->paginate(10);
        return Inertia::render('Admin/Dashboard', compact('posts'));
    }


    public function AdminShowMovie(Post $post): Response
    {
        $post = str_replace('%20', ' ', $post);
        $movie = Post::first();
        return Inertia::render('Admin/Movie', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
