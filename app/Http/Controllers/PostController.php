<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostManyTag;

class PostController extends Controller
{
    public readonly Post $post;
    public readonly PostManyTag $postManyTag;

    public function __construct()
    {
        $this->post = new Post();
        $this->postManyTag = new PostManyTag();
    }

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $posts = PostResource::collection($this->post->with('user', 'tag')->get());
            return $posts;
        }

        /**
         * Display the specified resource.
         */
        public function show(Post $post)
        {
            return new PostResource($post);
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $created = $this->post->create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'user_id' => $request->input('user_id'),
            ]);

            return $created;

        }

        /**
         * Store a newly created resource in storage.
         */
        public function storeMany(Request $request, Post $post)
        {
            $created_postManyTag= $this->postManyTag->create([
                'tag_id'=> $request->input('tag_id'),
                'post_id'=>$post["id"]
            ]);

            return $created_postManyTag;

        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Post $post)
        {
            $updated = $this->post->where('id', $post["id"])->update($request->except(['_token','_method']));
            return $updated;
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Post $post)
        {
            $deleted = $this->post->where('id', $post["id"])->delete();
            return $deleted;
        }
}
