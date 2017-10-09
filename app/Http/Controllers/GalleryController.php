<?php

namespace LEOCORP\Http\Controllers;

use Illuminate\Http\Request;
use LEOCORP\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Validator;
use Redirect;

class GalleryController extends Controller
{
    public function index()
    {
	    //Get images from the database and push to the gallery view to be displayed
	    $image_data = Gallery::orderBy('created_at','desc')->paginate(8);
	    return view('gallerie', compact('image_data'));
    }
    
    public function edit(Gallery $image)
    {
	    return view('adminPages.forms.gallery_edit', compact('image'));
    }
    
    public function update(Gallery $image, Request $request)
    {
	    try{
		    $this->validate($request, ['image_id' => 'required', 'image_title' => 'required' ,'image_path' => 'required', 'image_description' => 'required']);
		    $im_stat = false;
		    
		    if ($request->get('image_status') == 'yes')
		      {
			      $im_stat = true;
		      }
		      else{
			      $im_stat = false;
		      }
		    
		    DB::table('galleries')
            ->where('id', $request->get('image_id'))
            ->update(['image_title' => $request->get('image_title'),
            'image_description' => $request->get('image_description'), 
            'image_status' => $im_stat]);
            
	    }catch(QueryException $e)
	    {
		    flashMessage('Check your Input!', 'warning');
		    return back();
	    }
	    flashMessage('Update Successful!', 'success');
	    return Redirect::to('/gallery');
	    
    }
    
    public function fetch(Gallery $image)
    {
	    return view('adminPages.forms.gallery_delete', compact('image'));
    }
    
    public function destroy(Gallery $image, Request $request)
    {
	    try{
		    DB::table('galleries')->where('id', $request->get('image_id'))->delete();
		    $old_path = $request->get('image_path');
		    $split_path = pathinfo($old_path);
		    $filename = $split_path['basename'];
		    $destinationPath = 'images/gallery/deleted/'.$filename;
		    File::move($old_path, $destinationPath);
	    }catch(QueryException $e)
	    {
		    flashMessage('Unable to delete!', 'warning');
		    return back();
	    }
	    flashMessage('Delete Successful!', 'success');
	    return Redirect::to('/gallery');
    }
    
    public function upload(Request $request)
    {
	    
	  // getting all of the post data
	  $file = array('image' => Input::file('image'));
	  // setting up rules
	  $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
	  // doing the validation, passing post data, rules and the messages
	  $this->validate($request, ['image_title' => 'required', 'image_description' => 'required']);
	  $validator = Validator::make($file, $rules);
	  if ($validator->fails()) {
	    // send back to the page with the input data and errors
	    flashMessage('Validation Failed!', 'warning');
	    return Redirect::to('controlpanel');
	  }
	  else {
	    // checking file is valid.
	    if (Input::file('image')->isValid()) {
	      $destinationPath = public_path().'/images/gallery/uploads/'; // upload path
	      $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
	      $fileName = rand(11111,99999).'.'.$extension; // renameing image
	      Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
	      
	      //making entry into the database
	      $image = new Gallery;
	      $image->image_title = $request->get('image_title');
	      $image->image_path = 'images/gallery/uploads/'.$fileName;
	      $image->image_description = $request->get('image_description');
	      if ($request->get('image_status') == 'yes')
	      {
		      $image->image_status = true;
	      }
	      else{
		      $image->image_status = false;
	      }
	      $image->save();
	      
	      // sending back with message
	      flashMessage('Upload Successful!', 'success');
	      return Redirect::to('controlpanel');
	    }
	    else {
	      // sending back with error message.
	      flashMessage('Image Upload Failed!', 'warning');
	      return Redirect::to('controlpanel');
	    }
	  }
    }
    
    public function viewall()
    {
	    //Get images from the database and push to the gallery view to be displayed
	    $image_data = Gallery::orderBy('created_at','desc')->paginate(8);
	    return view('adminPages.gallerie', compact('image_data'));
    }
}
