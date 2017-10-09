<?php

namespace LEOCORP\Http\Controllers;

use Illuminate\Http\Request;
use LEOCORP\VCategory;
use LEOCORP\VTour;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Validator;
use Redirect;
use Auth;

class VirtualTourController extends Controller
{	
	public $vcat_list;
	
	public function category_list()
	{
		$vcat = VCategory::orderBy('created_at','desc')->get();
		//$vcat_list = array();
	    foreach ($vcat as $vc)
	    {
		    //$vcat_list[$vc->id] = $vc->vcat_name;
		    $GLOBALS['vcat_list'][$vc->id] = $vc->vcat_name;
	    }
	}
	
    public function home()
    {
	    $vcat_data = VCategory::orderBy('created_at','desc')->get();
	    return view('virtual_tour', compact('vcat_data'));
    }
    
    public function edit(VTour $vtour)
    {
	    $this->category_list();  
	    $vcat_list = $GLOBALS['vcat_list']; 
	    return view('adminPages.forms.vtour_edit', compact('vtour','vcat_list'));
    }
    
    public function update(VTour $vtour, Request $request)
    {
	    try{
		    $this->validate($request, ['vtour_id' => 'required', 
		    'vtour_title' => 'required' ,'vtour_path' => 'required', 
		    'vtour_description' => 'required', 'v_category_id' => 'required']);
		    $im_stat = false;
		    
		    if ($request->get('vtour_status') == 'yes')
		      {
			      $im_stat = true;
		      }
		      else{
			      $im_stat = false;
		      }
		    
		    DB::table('v_tours')
            ->where('id', $request->get('vtour_id'))
            ->update(['vtour_title' => $request->get('vtour_title'),
            'vtour_description' => $request->get('vtour_description'),
            'vtour_path' =>  $request->get('vtour_path'),
            'vtour_template' => $request->get('vtour_template'),
            'vtour_status' => $im_stat, 'v_category_id' => $request->get('v_category_id')]);
            
	    }catch(QueryException $e)
	    {
		    flashMessage('Check your Input!', 'warning');
		    return back();
	    }
	    flashMessage('Update Successful!', 'success');
	    return Redirect::to('/virtual_tour');
	    
    }
    
    public function fetch(VTour $vtour)
    {
	    $this->category_list();
	    $vcat_list = $GLOBALS['vcat_list'];
	    return view('adminPages.forms.vtour_delete', compact('vtour','vcat_list'));
    }
    
    
    public function traverse($srcpath, $destpath, $removeDir)
    {
	    //Create directory at destination, then traverse
	    $curdir = getcwd(); 
	    
	    //Get the name of the directory of interest
	    chdir($srcpath);
	    $url = getcwd();
	    //echo "The current source path to explore is: ".$url.PHP_EOL;
	    //echo "The current destination path is: ".$destpath.PHP_EOL;
		$array = explode(DIRECTORY_SEPARATOR,$url);
		$count = count($array);
		end($array);
		$key = key($array);
		//var_dump("The current folder is: ".$array[$key].PHP_EOL);
		
		if (strpos($destpath, $array[$key]) == false)
		{
			$destpath = $destpath.$array[$key];
		}
		//echo "Reconstructed destination path: ".$destpath.PHP_EOL;
		
		chdir($curdir);
		if(!file_exists($destpath))
		{
			mkdir($destpath, 0755);
			chdir($destpath);
		}else{
			chdir($destpath);
		}
	    
	    chdir($curdir);
	    $content = scandir($srcpath);
	    
	    if ($handle = opendir($srcpath))
	    {
		    while (false !== ($item = readdir($handle))) 
		    {
			    if($item != '.' && $item != '..' && $item != '.DS_Store')
			    {
				    if(is_dir($srcpath.DIRECTORY_SEPARATOR.$item))
				    {
					    //echo "\nGoing Down: $item >>\n".PHP_EOL;
					    $this->traverse($srcpath.DIRECTORY_SEPARATOR .$item.DIRECTORY_SEPARATOR, $destpath.DIRECTORY_SEPARATOR.$item, $removeDir);
				    }
				    else{
					    //echo "\n$item\n".PHP_EOL;
					    if(!copy($srcpath.DIRECTORY_SEPARATOR.$item, $destpath.DIRECTORY_SEPARATOR.$item))
					    {
						    dd("Unable to perform operation!! ".$item);
					    }
				    }
			    }
	    	}
	    	closedir($handle);
	    }
	    
	    //echo $srcpath;
	    if ($removeDir == true)
	    {
		    $this->delTree($srcpath);
	    }
	    
	    return $array[$key];
    }
    
    public function delTree($dir)
    { 
        $files = array_diff(scandir($dir), array('.', '..')); 

        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        }

        return rmdir($dir); 
    }
    
    public function destroy(VTour $vtour, Request $request)
    {
	    try{
		    DB::table('v_tours')->where('id', $request->get('vtour_id'))->delete();
		    if ($request->get('vcat_id') != 0)
		    {
			    $old_path = $request->get('vtour_path');
				$split_path = pathinfo($old_path);
				$dirname = $split_path['dirname'];
				$destinationPath = public_path().'/virtual_tours/deleted/';
				
				//function returns the destination path
				$this->traverse($dirname, $destinationPath, true);
		    }
	    }catch(QueryException $e)
	    {
		    flashMessage('Unable to perform operation!', 'warning');
		    return back();
	    }
	    flashMessage('Virtual Tour Successfully Deleted!', 'success');
	    return Redirect::to('/virtual_tour');
    }
    
    
    
    
    public function viewall()
    {
	    $vcat_data = VCategory::orderBy('created_at','desc')->get();
	    return view('adminPages.virtual_tour', compact('vcat_data'));
    }
    
    public function prep()
    {
	    $this->category_list();  
	    $vcat_list = $GLOBALS['vcat_list']; 
	    return view('adminPages.forms.vtour_upload', compact('vcat_list'));
    }
    
    public function upload(Request $request)
    { 
	  // getting all of the post data
	  $this->validate($request, ['vtour_title' => 'required',
	  'v_category_id' =>'required', 
	  'vtour_description' => 'required', 
	  'vtour_path' => 'required']);
	  
	  if($request->get('v_category_id') != 1)
	  {
		  //setting up rules
		  $file = array('vtour_template' => Input::file('vtour_template'),);
		  $rules = array('vtour_template' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
		  // doing the validation, passing post data, rules and the messages
		  $validator = Validator::make($file, $rules);
		  if ($validator->fails()) {
		    // send back to the page with the input data and errors
		    flashMessage($validator->messages(), 'warning');
		    return back();
		  }
		  
	  }
	  
    // checking file is valid.
    if (Input::file('vtour_template')->isValid()) 
    {
      $destinationPath = public_path().'/images/vt_thumbnails/'; // upload path
      $extension = Input::file('vtour_template')->getClientOriginalExtension(); // getting image extension
      $fileName = rand(11111,99999).'.'.$extension; // renameing image
      Input::file('vtour_template')->move($destinationPath, $fileName); // uploading file to given path
      
      //making entry into the database
      $vtour = new VTour;
      $vtour->vtour_title = $request->get('vtour_title');
      $vtour->v_category_id = $request->get('v_category_id');
      $vtour->vtour_template = 'images/vt_thumbnails/'.$fileName;
      
      if($request->get('v_category_id') != 1)
      {
	      $srcpath = $request->get('vtour_path');
	      $dstpath = public_path().'/virtual_tours/'; // upload path
	      $dirname = $this->traverse($srcpath, $dstpath, false);
	      $vtour->vtour_path = '/virtual_tours/'.$dirname.DIRECTORY_SEPARATOR.'index.html';
      }
      else{ //For Non-Interactive Tours
	      $vtour->vtour_path = $request->get('vtour_path');
      }
      $vtour->vtour_description = $request->get('vtour_description');
      if ($request->get('vtour_status') == 'yes')
      {
	      $vtour->vtour_status = true;
      }
      else{
	      $vtour->vtour_status = false;
      }
      $vtour->save();
      
      // sending back with message
      flashMessage('Upload Successful!', 'success');
      return Redirect::to('controlpanel');
    }
    else {
      // sending back with error message.
      flashMessage('Tour Upload Failed!', 'warning');
      return Redirect::to('controlpanel');
    }
    }

    
}
