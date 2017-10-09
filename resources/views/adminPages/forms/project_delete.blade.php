@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div>
	        <h4 id="info_header">DELETING >> {{ $project->project_title }}</h4>
	    </div>
	    <div>
	        {!! Form::open(['url' => 'projects/{{ $project->id }}', 'method' => 'DELETE']) !!}
	        	 
	        	 {!! Form::hidden('project_template',$project->project_template)!!}
				
				<div class="form-group">
					{!! Form::text('project_id',$project->id,['class' => 'form-control','id' => 'project_id', 'placeholder' => 'Project ID', 'readonly']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('project_title',$project->project_title,['id' => 'project_title', 'class' => 'form-control', 'placeholder' => 'Project Title', 'readonly']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Delete',['class' => 'btn btn-primary form-control']) !!}
				</div>
				<br>
			{!! Form::close() !!}
	        
	        <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
	    </div>
	</div>
</div>
@endsection