<?php

namespace LEOCORP\Http\Controllers;

use Illuminate\Http\Request;
use LEOCORP\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Validator;
use Redirect;
class UserController extends Controller
{
    public function index()
    {
	    $users = User::orderBy('created_at','asc')->get();
	    return  view('adminPages.user', compact('users'));
    }
    
    public function manage(User $user, Request $request)
    {
	       
	    switch($request->get('submitbutton'))
	    {
		    case 'Save':
		    	try
		    	{
			    	$this->validate($request, ['name' => 'required',
			    	'email' =>'required',]);
				  
				  				    	
			    	$im_stat = false;
				    if ($request->get('is_admin') == 'yes')
				      {
					      $im_stat = true;
				      }
				      else{
					      $im_stat = false;
				      }
				    
				    DB::table('users')
				    ->where('id', $request->get('user_id'))
				    ->update(['name' => $request->get('name'),
				    'email' => $request->get('email'),
				    'is_admin' =>  $im_stat]);
				      
				    flashMessage('Changes Saved!', 'success');
		    	}catch(QueryException $e)
		    	{
			    	flashMessage($e->message(), 'warning');
		    	}
				break;
		    case 'Delete':
		    	if($request->get('user_id') != 2)
		    	{
			    	DB::table('users')->where('id', $request->get('user_id'))->delete();
					flashMessage('Entry Deleted!', 'success');
		    	}else{
			    	flashMessage('Cannot be Deleted!!!', 'danger');
		    	}
				break;
		    
	    }
	    
	    return Redirect::to('/user');
    }
}
