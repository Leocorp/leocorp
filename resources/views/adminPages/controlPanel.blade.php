@extends('layouts.app')

@section('content')
<p id="info_header">This is where all company-threatening and life support decisions go down. You really must pay attention.</p>

<div class="row">
    <div class="col-xs-5 col-xs-offset-1 btn-admin">
        <a href="/user" class="btn btn-success">Users</a>
    </div>
    <div class="col-xs-5 btn-admin">
        <a href="#" class="btn btn-success">Subscribers</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-5 col-xs-offset-1 btn-admin">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#gallery_manage_form" >
	        Gallery</a>
    </div>
    <div class="col-xs-5 btn-admin">
        <a href="comments/view" class="btn btn-success">Comments</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-5 col-xs-offset-1 btn-admin">
        <a href="/category" class="btn btn-success" >Categories</a>
    </div>
    <div class="col-xs-5 col-xs-offset- btn-admin">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#vtour_manage_form">
	        Tours</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-5 col-xs-offset-1 btn-admin">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#projects_manage_form" >
	        Projects</a>
    </div>
    <div class="col-xs-5 btn-admin">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#app_manage_form">Applications</a>
    </div>
</div>
<br>
@include('adminPages.forms.gallery_manage')
@include('adminPages.forms.vtour_manage')
@include('adminPages.forms.projects_manage')
@include('adminPages.forms.applications_manage')

@endsection