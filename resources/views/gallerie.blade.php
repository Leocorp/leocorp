@extends('layouts.app')

@section('content')
	<div class="row">
		<div id=outside class="col-sm-9">
    
		    <!-- slideshow -->
		    <div class="cycle-slideshow" 
		        data-cycle-fx=scrollHorz
		        data-cycle-timeout="5000"
			    data-cycle-speed="1500"
			    data-cycle-loader="true"
		        data-cycle-prev="#prev"
		        data-cycle-next="#next"
			    data-cycle-slides="> a"
		        >
			    <div class="cycle-prev"></div>
				<div class="cycle-next"></div>
				@foreach ($image_data as $image)
					@if ($image->image_status == 1)
						<a href="{{ $image->image_path }}">
							<img height="300px" class="img-responsive" src="{{ url($image->image_path) }}" alt="{{ $image->image_title }}" >
						</a>
					@endif
				@endforeach
		    </div>
		    <!-- prev/next links -->
		    <br>
		    <div class="text-center">
		        <a id=prev>&lt;&lt;Prev </a>
		        <a id=next> Next&gt;&gt;</a>
		    </div>
		</div>
		<div class="col-sm-3">
			<div class="cycle-slideshow" 
			data-cycle-fx="fade" 
			data-cycle-timeout="5000"
			data-cycle-speed="1500"
			data-cycle-prev="#prev"
		    data-cycle-next="#next"
			data-cycle-slides="> div"
			>
		    @foreach ($image_data as $image)
		    	<div id="info_panel">
					<p>{{ $image->image_description }}</p>
				</div>
			@endforeach
			</div>	
		</div>
	</div>
	<br>
	<br>
	
	<div class="row lcp_gold">
		<div class="text-center col-xs-8 col-xs-offset-2">
		  @foreach ($image_data as $image)
		  	@if ($image->image_status == 1)
		    	<div class="cell">
					<a href="{{ $image->image_path }}">
						<img class="img-rounded" width="200px" src="{{ url($image->image_path) }}"><br>
						{{ $image->image_title }}
					</a>
					@if (!Auth::guest() && Auth::user()->is_admin)
						<div class=" pull-right">
							<a href="/gallery/{{ $image->id }}/edit"><span class="glyphicon glyphicon-cog"></span>Edit</a> | 
							<a href="/gallery/{{ $image->id }}/delete"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					@endif
				</div>
			@endif
		  @endforeach
		</div>
	</div>
	<div class="row">
	    <div class="text-center col-xs-10 col-xs-offset-1">
	      {{ $image_data->links() }}
	    </div>
	</div>
		
@endsection

@section('scripts')
	@if (!Auth::guest() && Auth::user()->is_admin)
		<!--script src="{{ asset('js/controlpanel.js') }}"></script -->
	@endif
@endsection