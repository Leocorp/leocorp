<?php

namespace LEOCORP\Http\Controllers;

use Illuminate\Http\Request;
use LEOCORP\VCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Validator;
use Redirect;

class CategoryController extends Controller
{
    public function index()
    {
	    $vcat = VCategory::orderBy('created_at','desc')->get();
	    return  view('adminPages.category', compact('vcat'));
    }
    
    public function manage(VCategory $category, Request $request)
    {
	       
	    switch($request->get('submitbutton'))
	    {
		    case 'Save':
		    	try
		    	{
			    	$this->validate($request, ['vcat_name' => 'required',
			    	'vcat_description' =>'required',]);
				  
				  				    	
			    	$im_stat = false;
				    if ($request->get('vcat_status') == 'yes')
				      {
					      $im_stat = true;
				      }
				      else{
					      $im_stat = false;
				      }
				    
				    DB::table('v_categories')
				    ->where('id', $request->get('vcat_id'))
				    ->update(['vcat_name' => $request->get('vcat_name'),
				    'vcat_description' => $request->get('vcat_description'),
				    'vcat_status' =>  $im_stat]);
				      
				    flashMessage('Changes Saved!', 'success');
		    	}catch(QueryException $e)
		    	{
			    	flashMessage($e->message(), 'warning');
		    	}
				break;
		    case 'Delete':
		    	DB::table('v_categories')->where('id', $request->get('vcat_id'))->delete();
		    	flashMessage('Entry Deleted!', 'success');
				break;
		    
	    }
	    
	    return Redirect::to('/category');
    }
    
    public function addnew(Request $request)
    {
	    try
	    {
		    $this->validate($request, ['vcat_name' => 'required',
			    	'vcat_description' =>'required',]);
			
			$vcat = new VCategory;
			$vcat->vcat_name = $request->get('vcat_name');
			$vcat->vcat_description = $request->get('vcat_description');
			
			$im_stat = false;
		    if ($request->get('vcat_status') == 'yes')
		      {
			      $im_stat = true;
		      }
		      else{
			      $im_stat = false;
		      }
		    $vcat->vcat_status = $im_stat;
		    $vcat->save();
			
			flashMessage('New Entry Added!', 'success');
	    }
	    catch(QueryException $e)
	    {
		    flashMessage($e->message(), 'warning');
	    }
	    
	    return Redirect::to('/category');
    }
}
