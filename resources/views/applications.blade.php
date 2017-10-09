@extends('layouts.app')

@section('content')
	<div>
		<p id="info_header">Our projects page is aimed at providing you with in-depth explanation of some <span style="color: #f7c546">magic</span> that happens, here @LEOCORP.</p>
		<br>
		
		<div class="row text-center">
			@foreach($app_data as $app)
				@if($app->app_status == 1)
					<div class="vt_cell tiptext" style="width: 200px">
		            	<div class="truncate"><span style="color: black;">{{$app->app_name}}</span></div>
		            	
			        	<img src="{{$app->app_template}}" class="img-thumbnail " width="100px" />
		        		<a href="apps/download/{{$app->id}}" class="btn btn-success">
			        		DOWNLOAD <span class="glyphicon glyphicon-download"></span>
			        	</a>
			        	@if (!Auth::guest() && Auth::user()->is_admin)
						<div class=" pull-right" style="background: black; margin-right: 5px; padding: 3px;">
							<a href="{{ url('apps/'.$app->id.'/edit') }}"><span class="glyphicon glyphicon-cog"></span>Edit</a> | 
							<a href="{{ url('apps/'.$app->id) }}" data-method="DELETE" data-token="{{csrf_token()}}"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					@endif
			        	<p class="description">{{$app->app_description}}</p>
		    		</div>
				@endif
			@endforeach
		</div>
		<br>
		<div class="row">
		    <div class="text-center col-xs-10 col-xs-offset-1">
		      {{ $app_data->links() }}
		    </div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/laravel.js') }}" type="text/javascript"></script>
@endsection
