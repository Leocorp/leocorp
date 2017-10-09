<?php

namespace LEOCORP\Http\Controllers;

use Illuminate\Http\Request;
use LEOCORP\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Validator;
use Redirect;

class ProjectsController extends Controller
{
    public function home()
    {
	    $project_data = Project::orderBy('created_at','desc')->paginate(8);
	    return view('projects', compact('project_data'));
    }
    
    public function project(Project $proj)
    {
	    $project = Project::where('id', $proj->id)->get();
	    return view('view-project', compact('project'));
    }
    
    public function viewall()
    {
	    $project_data = Project::orderBy('created_at','desc')->paginate(8);
	    return view('adminPages.projects', compact('project_data'));
    }
    
    public function addnew(Request $request)
    {
	    
	  // getting all of the post data
	  $file = array('project_template' => Input::file('project_template'));
	  // setting up rules
	  $rules = array('project_template' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
	  // doing the validation, passing post data, rules and the messages
	  $this->validate($request, ['project_title' => 'required', 'project_description' => 'required']);
	  $validator = Validator::make($file, $rules);
	  if ($validator->fails()) {
	    // send back to the page with the input data and errors
	    flashMessage('Validation Failed!', 'warning');
	    return Redirect::to('controlpanel');
	  }
	  else {
	    // checking file is valid.
	    if (Input::file('project_template')->isValid()) {
	      $destinationPath = public_path().'/images/projects/'; // upload path
	      $extension = Input::file('project_template')->getClientOriginalExtension(); // getting image extension
	      $fileName = rand(11111,99999).'.'.$extension; // renameing image
	      Input::file('project_template')->move($destinationPath, $fileName); // uploading file to given path
	      
	      //making entry into the database
	      $project = new Project;
	      $project->project_title = $request->get('project_title');
	      $project->project_template = 'images/projects/'.$fileName;
	      $project->project_description = $request->get('project_description');
	      if ($request->get('project_status') == 'yes')
	      {
		      $project->project_status = true;
	      }
	      else{
		      $project->project_status = false;
	      }
	      $project->save();
	      
	      // sending back with message
	      flashMessage('Upload Successful!', 'success');
	      return Redirect::to('controlpanel');
	    }
	    else {
	      // sending back with error message.
	      flashMessage('Project Upload Failed!', 'warning');
	      return Redirect::to('controlpanel');
	    }
	  }
    }
    
    public function edit(Project $project)
    {
	    return view('adminPages.forms.project_edit', compact('project'));
    }
    
    public function update(Project $project, Request $request)
    {
	    try{
		    $this->validate($request, ['project_id' => 'required', 'project_title' => 'required' ,'project_template' => 'required', 'project_description' => 'required']);
		    $im_stat = false;
		    
		    if ($request->get('project_status') == 'yes')
		      {
			      $im_stat = true;
		      }
		      else{
			      $im_stat = false;
		      }
		    
		    DB::table('projects')
            ->where('id', $request->get('project_id'))
            ->update(['project_title' => $request->get('project_title'),
            'project_template' => $request->get('project_template'),
            'project_description' => $request->get('project_description'), 
            'project_status' => $im_stat]);
            
	    }catch(QueryException $e)
	    {
		    flashMessage('Check your Input!', 'warning');
		    return back();
	    }
	    flashMessage('Update Successful!', 'success');
	    return Redirect::to('/controlpanel');
	    
    }
    
    public function fetch(Project $project)
    {
	    return view('adminPages.forms.project_delete', compact('project'));
    }
    
    public function destroy(Project $project, Request $request)
    {
	    try{
		    DB::table('projects')->where('id', $request->get('project_id'))->delete();
		    $old_path = $request->get('project_template');
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
	    return Redirect::to('/controlpanel');
    }
}
