<?php

namespace LEOCORP\Http\Controllers;

use Illuminate\Http\Request;
use LEOCORP\Comment;
use Illuminate\Support\Facades\DB;
use Auth;

class CommentsController extends Controller
{
	public function home()
    {
	    $comment_data =  Comment::orderBy('created_at','desc')->take(10)->paginate(15);
	   	return view('adminPages.comments', compact('comment_data'));
    }
    
    public function store(Request $request)
    {
	    $this->validate($request, ['comment' => 'required']);
	    $comment = new Comment;
		$comment->comment = $request->get('comment');
	    if (Auth::guest() == true)
	    {
		    //Manual save 
		    
		    $comment->user_id = 1;
	    }
	    else{
		    //Auto save
		    $comment->user_id = Auth::id();
	    }
	    $comment->save();
	    flashMessage('Thanks for your feedback!', 'success');
	    return back();
    }
}
