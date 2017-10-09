@extends('layouts.app')

@section('content')
	<div>
		<p id="info_header">You are now viewing: <b>{{ $project[0]->project_title }}</b> Project</p>
		<br>
		
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="row text-center intro_text">
					<h3 class="projectTitle">{{$project[0]->project_title}} Project</h3>
					<img src="{{ url($project[0]->project_template) }}" class="thumbnail" width="200" height="200" />
					<p >{{ $project[0]->project_description }}</p>
				</div>
			</div>
		</div>
		<br>
	</div>
@endsection