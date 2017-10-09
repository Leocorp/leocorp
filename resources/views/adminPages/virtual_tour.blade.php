@extends('layouts.app')

@section('content')
    <div class="row">
	    <p><b style="color: red;">ADMIN: MODE</b></p>
        <div class="col-xs-10 col-xs-offset-1">
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
			                    	<?php #var_dump($vcat->vcat_name); ?>
			                    	@if ($vcat->vcat_name === "Non-Interactive Virtual Tours")
			                    		<div class="vt_cell">
					                    	<b>{{$vtour->vtour_title}}</b>
				                    		<iframe class="img-responsive" width="380" height="315" src="{{ $vtour->vtour_path }}" frameborder="0" allowfullscreen></iframe>
				                    		@if (!Auth::guest() && Auth::user()->is_admin)
												<div class=" pull-right">
													<a href="/virtual_tour/{{ $vtour->id }}/edit"><span class="glyphicon glyphicon-cog"></span>Edit</a> | 
													<a href="/virtual_tour/{{ $vtour->id }}/delete"><span class="glyphicon glyphicon-trash"></span></a>
												</div>
											@endif
				                    	</div>
			                    	@elseif ($vcat->vcat_name === "Interactive Virtual Tours")
				                    	<div class="vt_cell">
					                    	<div class="truncate"><span style="color: black;"><b>{{ $vtour->vtour_title }}</b></span></div>
				                    		<a href="{{ $vtour->vtour_path }}">
					                    		<img src="{{ url($vtour->vtour_template) }}" class="img-responsive cell" width="200px">
					                    	</a>
					                    	@if (!Auth::guest() && Auth::user()->is_admin)
												<div class=" pull-right">
													<a href="/virtual_tour/{{ $vtour->id }}/edit"><span class="glyphicon glyphicon-cog"></span>Edit</a> | 
													<a href="/virtual_tour/{{ $vtour->id }}/delete"><span class="glyphicon glyphicon-trash"></span></a>
												</div>
											@endif
			                    		</div>
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