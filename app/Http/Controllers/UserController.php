<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    public readonly User $user;
    public readonly Post $post;

    public function __construct()
    {
        $this->user = new User();
        $this->post = new Post();
    }

        /**
         * Display a listing of the resource.
         */
        public function index(Post $post)
        {
            $users = UserResource::collection($this->user->with('post')->get());
            return $users;
        }

        /**
         * Display the specified resource.
         */
        public function show(User $user)
        {
            return new UserResource($user);
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $created = $this->user->create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
            ]);
            return $created;

        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, User $user)
        {
            $updated = $this->user->where('id', $user["id"])->update($request->except(['_token','_method']));
            return $updated;
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(User $user)
        {
            $deleted = $this->user->where('id', $user["id"])->delete();
            return $deleted;
        }
}
