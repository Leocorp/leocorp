<?php

namespace LEOCORP\Http\Controllers;
use LEOCORP\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Validator;
use Redirect;

class ApplicationsController extends Controller
{
    public function home()
    {
	    $app_data = Application::orderBy('created_at','desc')->paginate(15);
	    return view('applications', compact('app_data'));
    }
    
    public function viewall()
    {
	    $app_data = Application::orderBy('created_at','desc')->paginate(15);
	    return view('adminPages.applications', compact('app_data'));
    }
    
    public function addnew(Request $request)
    { 
	  // setting up rules
	  $rules = array('app_template' => 'required|mimes:jpeg,jpg,png', 'app_path' => 'required');
	  
	  $this->validate($request, ['app_name' => 'required', 'app_description' => 'required']);
	  $validator = Validator::make($request->all(), $rules);
	  if ($validator->fails()) {
	    flashMessage('Validation Failed!', 'warning');
	    return Redirect::to('controlpanel');
	  }
	  else {
	    if (Input::file('app_template')->isValid() && Input::file('app_path')->isValid()) 
	    {
	      $destinationPath = public_path().'/applications/'; // upload path
	      $extension = Input::file('app_template')->getClientOriginalExtension(); // getting extension
	      $fileName = rand(11111,99999).'.'.$extension; // renameing file
	      Input::file('app_template')->move($destinationPath, $fileName); // uploading file to given path
	      //upload the application
	      $app_name = Input::file('app_path')->getClientOriginalName();
	      Input::file('app_path')->move($destinationPath, $app_name);
	      
	      //making entry into the database
	      $application = new Application;
	      $application->app_name = $request->get('app_name');
	      $application->app_template = 'applications/'.$fileName;
	      $application->app_path = 'applications/'.$app_name;
	      $application->app_description = $request->get('app_description');
	      if ($request->get('app_status') == 'yes')
	      {
		      $application->app_status = true;
	      }
	      else{
		      $application->app_status = false;
	      }
	      $application->save();
	      
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
    
    public function download(Application $application)
    {
	    //dd($application->app_name);
	    return response()->download($application->app_path);
    }
    
    public function edit(Application $application)
    {
	    return view('adminPages.forms.app_edit', compact('application'));
    }
    
    public function update(Application $application, Request $request)
    {
	    try{
		    $this->validate($request, ['app_id' => 'required', 
		    'app_name' => 'required' ,'app_template' => 'required',
		    'app_path' => 'required', 'app_description' => 'required']);
		    $im_stat = false;
		    
		    if ($request->get('app_status') == 'yes')
		      {
			      $im_stat = true;
		      }
		      else{
			      $im_stat = false;
		      }
		    
		    DB::table('applications')
            ->where('id', $request->get('app_id'))
            ->update(['app_name' => $request->get('app_name'),
            'app_template' => $request->get('app_template'),
            'app_path' => $request->get('app_path'),
            'app_description' => $request->get('app_description'), 
            'app_status' => $im_stat]);
            
	    }catch(QueryException $e)
	    {
		    flashMessage('Check your Input!', 'warning');
		    return back();
	    }
	    flashMessage('Update Successful!', 'success');
	    return Redirect::to('/controlpanel');
	    
    }
    
    function moveDeleted($old_path)
    {
	    $split_path = pathinfo($old_path);
	    $filename = $split_path['basename'];
	    $destinationPath = 'applications/deleted/'.$filename;
	    File::move($old_path, $destinationPath);
    }
    
    public function destroy(Application $id)
    {
	    try{
		    //dd($id);
		    $this->moveDeleted($id->app_template);
		    $this->moveDeleted($id->app_path);
		    DB::table('applications')->where('id', $id->id)->delete();
	    }catch(QueryException $e)
	    {
		    flashMessage('Unable to delete!', 'warning');
		    return back();
	    }
	    flashMessage('Delete Successful!', 'success');
	    return Redirect::to('/controlpanel');
    }
}
