<?php

namespace LEOCORP\Http\Controllers;

use Illuminate\Http\Request;
use LEOCORP\Subscription;

class SubscriptionsController extends Controller
{
	public function show()
	{
		return view('forms.subscription');
	}
    public function store(Request $request)
    {
	    try{
		    $this->validate($request, ['email' => 'required']);
		    $subscription = new Subscription;
		    $subscription->email = $request->get('email');
		    $subscription->save();
	    }catch(\Illuminate\Database\QueryException $e)
	    {
		    flashMessage('Email Already Subscribed!', 'warning');
		    return \Redirect::to('/');
	    }
	    flashMessage('Thanks for Subscribing!', 'success');
	    return \Redirect::to('/');
    }
}
