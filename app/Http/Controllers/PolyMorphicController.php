<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Page;
use App\Models\Comment;


class PolyMorphicController extends Controller
{
    public function __construct(Post $post,Page $page, Comment $comment){
        $this->post = $post;
        $this->page = $page;
        $this->comment = $comment;
    }

    /**
     * @return view page
     */
    public function view(){
        $posts = $this->post->get();
        $pages = $this->page->get();

        // polymorphic relationship
        $comments = $this->comment->with('commentable')->get();
        return view('view',compact('posts','pages','comments'));
    }

    /**
     * @param Request
     * @return view page
     */

    public function submit(Request $request){
        $this->post->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $this->page->create([
            'title' => $request->page_title,
        ]);
        return \Redirect('/content-view');
    }

    /**
     * @param Request
     * Post comment && Page comment
     * @return back
     */
    public function comment(Request $request){

        // if comment for post
        if(isset($request->post_id)){
            $post = $this->post->where('id',$request->post_id)->first();
            $class = get_class($post);
            $id = $request->post_id;
            
        }else{
            $page = $this->page->where('id',$request->page_id)->first();
            $class = get_class($page);
            $id = $request->page_id;
        }
        
        $this->comment->create([
            'commentable_type' => $class,
            'commentable_id' => $id,
            'content' => $request->comment
        ]);

        return \Redirect::back();
    }
}
