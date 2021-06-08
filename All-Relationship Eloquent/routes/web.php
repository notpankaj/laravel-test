<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Address;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

 
Route::get('/users',function(){
    $users = User::doesntHave('posts')->with('posts')->get();

    //create posts for users
    // $users[0]->posts()->create([
    //     'title' => "post title 4"
    // ]);
    return view('users.index',['users' => $users]);
});


Route::get('/addresses',function (){
    
    //create user
    $user = \App\Models\User::factory()->create();
    
    //creating address
    $address = new \App\Models\Address([
        'country' => "Korea",
    ]);
        
    //adding address to user
    $address->user()->associate($user);
    $address->save();
    //return $address;

    // $addresses =  \App\Models\Address::all();
    // PERFORMACE CLAUSE with("  relationship method  ") thru SELECT * from _ IN ()
    $addresses =  \App\Models\Address::with("user")->get();
    // return $addresses;
    return view('users.index',['addresses'=>$addresses]);
});


Route::get('/',function(){
    // $user1 = User::create([
    //     'name' => 'user A',
    //     'email' => 'userA@test.com',
    //     'password' => Hash::make('12345'),
    // ]);
    // $user = User::create([
    //     'name' => 'Harish',
    //     'email' => 'harish@example.com',
    //     'password' => Hash::make('12345'),
    // ]);

    // $post = Post::create([
    //     'user_id' => $user->id,
    //     'title' => 'example post titlt',
    // ]);

    // //creating comments
    // $post->comments()->create([
    //     'user_id' => $user->id,
    //     'body' => 'comment for post',
    // ]);


    //create video data
    // $video = Video::create([
    //     'title' => "example video title"
    // ]);

    // $video->comments()->create([
    //     'user_id' => 1,
    //     'body' => 'comment for video'
    // ]);

    // $comment = Comment::find(3);
    // return $comment; //comment id 1 
//    dd($comment->commentable); //fetch commentable model 
//    return $comment->subject; //get model which this comments belongs to

    $post = Post::find(1);
    return $post->comment;
    // // $post->comments()->create([
    // //     'user_id' => 1,
    // //     'body' =>'2nd comment for post'
    // // ]);
});


Route::get('/posts',function(){
    
    
    // Tag::create([
    //     'name'=> "laravel"
    // ]);
    // Tag::create([
    //     'name'=> "javascript"
    // ]);
    // Tag::create([
    //     'name'=> "php"
    // ]);
    // Tag::create([
    //     'name'=> "nodejs"
    // ]);

    // tag obj
    // $tag = Tag::first();
    // post obj
    // $post = Post::first();
    // dd($post->tags);
    // $post->tags()->attach($tag); //tag obj or tag id
    //  $post->tags()->attach([3,2]); 
    

    
    
    
    
    
    // $post = Post::find('10');
    // // dd($post); //attributes will have $timestamps from posts table
    // // dd($post->tags); //attributes will have $timestamps from tags table
    // //  dd($post->tags[0]->pivot->created_at); //return data from pivot table
    // //  dd($post->tags[0]->pivot->updated_at); //return data from pivot table
    
    // return $post->tags[0]->pivot->updated_at;
    
    
    //--------------------------------------
    
    // Tag::create([
        //     'name' => "node.js"
        // ]);
        
        $post = Post::first();
        // return $post->tags()->attach([
        //     1 => [
        //         'status' => 'approved'
        //     ]
        // ]);
        
        dd($post->tags()->first()->pivot->status); //attribute will have missing status value

        

    // $posts= Post::all();
    
    // return view('posts.index',['posts'=>$posts]);
});


Route::get('/tags',function(){

   
    // $video = Video::create([
    //     'title' => 'video_title 1'
    // ]);
    $tag = Tag::find(1);
    //create video attched to tag
    // $tag->videos()->create([
    //     'title' => "video title 2"
    // ]);
    // return $tag->posts; //collection of posts attached to tag_id 1 
    // return $tag->videos; //collection of videos attached to tag_id 1
    
    // $video->tags()->attach($tag);

// $video = Video::find(1);
// return $video->tags;


//create post, tag and attached the tag to post in taggable  
    // $post = Post::create([
    //     'user_id' => 1,
    //     'title' => 'post title 1'
    // ]);
    
    // $post->tags()->create([
    //     'name' => 'pyhone'
    // ]);
    
    //attach mathod to create attached the tag to post in taggable 
    // $post = Post::find(1);
    // $tag = Tag::create([
    //     'name' => "PHP",
    // ]);
    // $post->tags()->attach($tag); 

});



Route::get('/projects',function(){
    // $project1 = Project::create([
    //     'title' => 'Project A'
    // ]);
    // $project2 = Project::create([
    //     'title' => 'Project B'
    // ]);

    // $user1 = User::create([
    //     'name' => 'user A',
    //     'email' => 'userA@test.com',
    //     'password' => Hash::make('12345'),
    // ]);
    // $user2 = User::create([
    //     'name' => 'user B',
    //     'email' => 'userB@test.com',
    //     'password' => Hash::make('12345'),
    // ]);
    // $user3 = User::create([
    //     'name' => 'user C',
    //     'email' => 'userC@test.com',
    //     'password' => Hash::make('12345'),
    // ]);

    // $project1->users()->attach($user1);
    // $project1->users()->attach($user2);
    // $project1->users()->attach($user3);

    // $project2->users()->attach($user1);
    // $project2->users()->attach($user3);
        
    
    
    
    //create task
    // Task::create([
        //     'title' => 'Task A',
        //     "user_id" => 1, 
        // ]);
        // Task::create([
            //     'title' => 'Task B',
            //     "user_id" => 1, 
            // ]);
            // Task::create([
                //     'title' => 'Task C',
                //     "user_id" => 2, 
                // ]);
    // Task::create([
        //     'title' => 'Task D',
        //     "user_id" => 3, 
        // ]);



        // $project = Project::find(1);
        // // return $project->tasks;
        
        // return $project->task;

        
    
        // $user = User::find(3);
        // return $user->projects;



});