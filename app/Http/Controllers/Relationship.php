<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
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
}
