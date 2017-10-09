@extends('layouts.app')

@section('content')
	<p><b style="color: red;">ADMIN: MODE</b></p>
	<br>
	
	<div class="row lcp_gold">
		<div class="text-center col-xs-8 col-xs-offset-2">
		  @foreach ($image_data as $image)
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
		@endforeach
	    <div class="cell">
	      
	    </div>
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