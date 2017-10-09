@extends('layouts.app')

@section('content')
	<div>
		<p id="info_header">Our projects page is aimed at providing you with in-depth explanation of some <span style="color: #f7c546">magic</span> that happens, here @LEOCORP.</p>
		<br>
		
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3">
				@foreach($project_data as $project)
					@if($project->project_status == 1)
						<a href="projects/{{ $project->id }}"  class="btn btn-primary">{{$project->project_title}}</a>
					@endif
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