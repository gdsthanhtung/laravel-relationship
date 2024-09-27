<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class Relationship extends Controller
{
    public function avatar(){
        $user = User::find(19);
        $avt = $user->avatar;
        dump([$user, $avt]);

        $avt = Avatar::find(2);
        $user = $avt->user;
        dump([$avt, $user]);
    }

    public function posts(){
        $user = User::find(19);
        $posts = $user->posts;
        dump([$user, $posts]);

        $post = Post::find(2);
        $user = $post->user;
        dump([$post, $user]);
    }

    public function categories(){
        $posts = Post::find(2);
        $categories = $posts->category;
        dump([$posts, $categories]);

        $categories = Category::find(1);
        $posts = $categories->posts;
        dump([$categories, $posts]);
    }

    public function categoriesAttach(){
        $posts = Post::find(3);
        $posts->categories()->attach([1,2]);
    }

    public function categoriesDetach(){
        $posts = Post::find(3);
        $posts->categories()->detach([1,2]);
    }

    public function categoriesSync(){
        $posts = Post::find(3);
        $posts->categories()->sync([3,4]);
    }
}
