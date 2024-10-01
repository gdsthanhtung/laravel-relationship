<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
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

    public function postsThroughCategory()
    {
        $user = User::find(18);
        $post = $user->postThroughCategory;
        $postssss = $user->postssssThroughCategory;

        dd($post, $postssss);
    }

    public function polyOneOne()
    {
        $user = User::find(18);
        $userImage = ($user) ? $user->image : 'N/A';

        $post = Post::find(2);
        $postImage = ($post) ? $post->image : 'N/A';

        dd($userImage, $postImage);
    }

    public function polyOneMany()
    {
        $post = Post::find(5);
        $postComment    = ($post) ? $post->comment  : 'N/A';
        $postComments   = ($post) ? $post->comments : 'N/A';

        dd($postComment, $postComments);
    }

    public function polyOneCreate()
    {
        $image = new Image([
            'url' => 'http://image.com/1.png'
        ]);

        $post = Post::find(5);
        $rs = $post->image()->save($image);
        dump($rs);

        $comment = new Comment([
            'user_id' => 18,
            'content' => 'RedMagic Nova'
        ]);

        $post = Post::find(4);
        $rs = $post->comment()->save($comment);
        dump($rs);
    }

    public function polyManyCreate()
    {
        // Tạo tag và lưu relaionship records
        $tag1 = new Tag([
            'name' => 'iphone'
        ]);

        $tag2 = new Tag([
            'name' => 'android'
        ]);

        $post = Post::find(5);
        //$rs = $post->tags()->saveMany([$tag1, $tag2]);
        //dump($rs);

        // Link tag có sẵn với post
        $tag1 = Tag::find(1);
        $tag2 = Tag::find(2);
        $post = Post::find(4);
        $post->tags()->attach([$tag1->id, $tag2->id]);
        // detach | sync
        return true;
    }

    public function polyManyMany()
    {
        $post = Post::find(4);
        dump($post, $post->tags);
    }

    public function allPost(){
        //$posts = Post::get();
        $posts = Post::with('user:id,name', 'user.image', 'categories')->get();

        // $posts = Post::with([
        //     'categories' => function($query){
        //         $query->where('name', 'like', '%au%');
        //     },
        //     'user.image'
        // ])->get();

        dd($posts);

        return view('relationship.allpost', compact('posts'));
    }

    public function getAllPost($user = false, $image = false, $category = false){
        $posts = Post::all();
        if($user)           $posts->load('user:*');
        if($user && $image) $posts->load('user.image');
        if($category)       $posts->load('categories');
        return $posts;
    }

    public function getPostsByNeedleData(){
        $posts = $this->getAllPost($user = true, $image = true, $category = true);

        dump($posts);

        return view('relationship.allpost', compact('posts'));
    }
}
