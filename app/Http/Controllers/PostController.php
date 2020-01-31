<?php

namespace App\Http\Controllers;

use App\Post;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResource;
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Topic $topic)
    {
        $post = new Post();
        $post->body = $request->body;
        $post->user()->associate($request->user());
        $topic->posts()->save($post);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Topic $topic, Post $post)
    {
        $this->authorize('update', $post);
        $post->body = $request->get('body', $post->body);
        $post->save();
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic, Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return response(null, 204);
    }
}
