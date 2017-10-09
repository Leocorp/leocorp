<?php

namespace LEOCORP\Http\Controllers;

use Illuminate\Http\Request;
use LEOCORP\User;
use LEOCORP\Gallery;
use LEOCORP\Subscription;
use LEOCORP\Comment;
use LEOCORP\VCategory;
use LEOCORP\VTour;
use Illuminate\Support\Facades\DB;

class AdministrationController extends Controller
{
    public function ControlPanel()
    {
	    return view('adminPages.controlPanel');
    }
    
    public function ManageGallery()
    {
	    //Get images from the database and push to the gallery view to be displayed
	    $image_data = Gallery::orderBy('created_at','desc')->get();
	    return view('adminPages.manage_gallery', compact('image_data'));
    }
}
