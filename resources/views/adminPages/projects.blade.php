@extends('layouts.app')

@section('content')
	<div>
		<p id="info_header">Our projects page is aimed at providing you with in-depth explanation of some <span style="color: #f7c546">magic</span> that happens, here @LEOCORP. <b style="color: red;">ADMIN: MODE</b></p>
		<br>
		
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3">
				@foreach($project_data as $project)
					<a href="{{ url('projects/'.$project->id) }}" class="btn btn-primary">{{$project->project_title}}</a>
					@if (!Auth::guest() && Auth::user()->is_admin)
						<div class=" pull-right">
							<a href="{{ url('projects/'.$project->id.'/edit') }}"><span class="glyphicon glyphicon-cog"></span>Edit</a> | 
							<a href="{{ url('projects/'.$project->id.'/delete') }}"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					@endif
					<br>
				@endforeach
			</div>
		</div>
		<br>
		<div class="row">
		    <div class="text-center col-xs-10 col-xs-offset-1">
		      {{ $project_data->links() }}
		    </div>
		</div>
	</div>
@endsection