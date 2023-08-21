<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Resources\TagResource;

class TagController extends Controller
{
    
    public readonly Tag $tag;

    public function __construct()
    {
        $this->tag = new Tag();
    }

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $tags = TagResource::collection($this->tag->with('post')->get());
            return $tags;
        }

        /**
         * Display the specified resource.
         */
        public function show(Tag $tag)
        {
            return new TagResource($tag);
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $created = $this->tag->create([
                'name' => $request->input('name'),
            ]);
            return $created;

        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Tag $tag)
        {
            $updated = $this->tag->where('id', $tag["id"])->update($request->except(['_token','_method']));
            return $updated;
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Tag $tag)
        {
            $deleted = $this->tag->where('id', $tag["id"])->delete();
            return $deleted;
        }
}
