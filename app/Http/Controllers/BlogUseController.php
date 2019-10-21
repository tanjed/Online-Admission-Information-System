<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogUseController extends Controller
{
   public function showBlog(){
       $blog_posts = Post::with('student')->paginate(10);
       return view('blog.blog_post',compact('blog_posts'));
   }
   public function createPost(Request $request){
       $id = auth('student')->user()->id;
        try{
            Post::create([
                'student_id' => $id,
                'post_title' => $request->post_body,
                'publish_date' => Carbon::today()
            ]);
        }catch (Exception $e){
            dd($e);
        }
       return redirect(route('blog.timeline'));
   }

   public function postDescription($id){
       $post = Post::with('comments')->find($id);
       $author = $post->student;

       return view('blog.single_post',compact('post','author'));
   }
   public function postComment(Request $request,$id){
       try{
           Comment::create([
               'post_id' => $id,
               'comment_author' => auth('student')->user()->name,
               'comment_body' => $request->comment,
               'comment_date' => Carbon::today(),
           ]);
       }catch (Exception $e){
           dd($e);
       }
       return redirect('/blog/post/'.$id);
   }
}
