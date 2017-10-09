@extends('layouts.app')

@section('content')
	<div class="lead intro_text">
        <p>In order to serve you with the best, our current project dubbed 'The Virtual Tour' or V.T seeks to address issues encountered by many businesses. We are talking about visualisation. Ever wished you could show your <b>client</b> exactly what image you had in mind?, that you could present a prototype in the early stages of your project? and have the ability to make critical decisions on model designs before work commences?
If <b>YES</b>, then The Virtual Tour is for you. </p>
<p>This project @LEOCORP, comes packaged with what we like to call a 'Second Hand Transformation'. We takeover your construction project (in the plan phase or completion phase) , scale it up to standard, and furnish it with <i>the idea that works!.</i> Enabling you to extend your reach to your probable clientele wherever they might be. Up next are some of our works, take a good look and make that decision. <i>"Choose LEOCORP, Choose the idea that works!"</i></p>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <h4><span style="color: white">Our Virtual Tours in 3 categories: </span></h4>
            <ul class="nav nav-tabs nav-justified vt_tabs">
                @foreach($vcat_data as $vcat)
	            	@if($vcat->id === 1)
	            		<li class="active"><a href="#{{$vcat->id}}" data-toggle="tab">{{$vcat->vcat_name}}</a></li>
	            	@else
	            		<li><a href="#{{$vcat->id}}" data-toggle="tab">{{$vcat->vcat_name}}</a></li>
	            	@endif
	            	
	            @endforeach
            </ul>
            <div class="tab-content lcp_gold">
	            <?php 
	            	$v_class = "";
	             ?>
	            @foreach ($vcat_data as $vcat)
	            	
	            	
	            	@if ($vcat->id === 1)
	            		<?php
		            		$v_class = "tab-pane fade in active";
	            		?>
	            	@elseif ($vcat->id === 2)
	            		<?php 
		            		$v_class = "tab-pane fade";
	            		?>
	            	@else
	            		<?php 
		            		$v_class = "tab-pane fade";
	            		?>
	            	@endif
	            	<div class="{{$v_class}}" id={{$vcat->id}}>
	                    <div class="row">
			                <div class="page-header text-center vt_panel_header">
			                    <h4> {{ $vcat->vcat_name }}</h4>
			                </div>
			                <div class="v_tours text-center">
				                
			                    @foreach ($vcat->vtours as $vtour)
			                    	@if (($vtour->vtour_status == 1))
				                    	@if (($vcat->vcat_name === "Non-Interactive Virtual Tours"))
				                    		<div class="vt_cell tiptext">
						                    	<b>{{$vtour->vtour_title}}</b>
					                    		<iframe class="img-responsive" width="380" height="315" src="{{ $vtour->vtour_path }}" frameborder="0" allowfullscreen></iframe>
					                    		@if (!Auth::guest() && Auth::user()->is_admin)
													<div class=" pull-right">
														<a href="/virtual_tour/{{ $vtour->id }}/edit"><span class="glyphicon glyphicon-cog"></span>Edit</a> | 
														<a href="/virtual_tour/{{ $vtour->id }}/delete"><span class="glyphicon glyphicon-trash"></span></a>
													</div>
												@endif
												<p class="description" style="color: black">{{ $vtour->vtour_description }}</p>
					                    	</div>
				                    	@elseif (($vcat->vcat_name === "Interactive Virtual Tours"))
					                    	<div class="vt_cell tiptext" style="width: 250px;">
						                    	<div class="truncate"><span style="color: black;"><b>{{ $vtour->vtour_title }}</b></span></div>
					                    		<a href="{{ $vtour->vtour_path }}">
						                    		<img src="{{ $vtour->vtour_template }}" class="img-responsive cell" width="200px">
						                    	</a>
						                    	@if (!Auth::guest() && Auth::user()->is_admin)
													<div class=" pull-right">
														<a href="/virtual_tour/{{ $vtour->id }}/edit"><span class="glyphicon glyphicon-cog"></span>Edit</a> | 
														<a href="/virtual_tour/{{ $vtour->id }}/delete"><span class="glyphicon glyphicon-trash"></span></a>
													</div>
												@endif
												<p class="description" style="color: black">{{ $vtour->vtour_description }}</p>
				                    		</div>
					                    @endif
				                    @endif
				              
			                    @endforeach
			                </div>
	    				</div>
	    				
	            	</div>
	            @endforeach
                
            </div>
                    
        </div>
    </div>
    
    
@endsection