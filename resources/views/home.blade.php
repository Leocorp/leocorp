@extends('layouts.app')

@section('content')
<div class="col-xs-12"> 
    <div class="cycle-slideshow slider" 
        data-cycle-fx="scrollHorz"
		data-cycle-timeout="3000"
		data-cycle-loader="wait"
		>
		<div class="cycle-pager"></div>
		<div class="cycle-overlay"></div>
		
	    <img class="img-responsive" src="{{ url('images/slides/1.jpg') }}" data-cycle-title="1964 Impala" data-cycle-desc="Modified build - V1">
	    <img class="img-responsive" src="{{ url('images/slides/2.jpg') }}" data-cycle-title="LookMan" data-cycle-desc="From whence I cometh, we shoot Rockets and that ...">
	    <img class="img-responsive" src="{{ url('images/slides/3.jpg') }}" data-cycle-title="Forest Green" data-cycle-desc="A spectacle somewhere, made by nature">
	    <img class="img-responsive" src="{{ url('images/slides/4.jpg') }}" data-cycle-title="Der Kügel" data-cycle-desc="Built for the Masters only!.">
	</div>
    
</div>
    

<div class="row">
    <div class="col-xs-5 col-xs-offset-1 ">
        <a href="/gallery" class="btn btn-primary">gallery</a>
    </div>
    <div class="col-xs-5 ">
        <a href="/virtual_tour" class="btn btn-primary">V.Tour</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-5 col-xs-offset-1">
        <a href="/apps" class="btn btn-primary" >apps</a>
    </div>
    <div class="col-xs-5 ">
        <a href="/projects" class="btn btn-primary">projects</a>
    </div>
</div>
    
@endsection
