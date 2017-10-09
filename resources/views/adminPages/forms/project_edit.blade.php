@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div>
	        <h4 id="info_header">PROJECT| EDITING >> {{ $project->project_title }}</h4>
	    </div>
	    <div>
	        {!! Form::open(['url' => 'projects/{{ $project->id }}', 'method' => 'POST']) !!}
	        
	        	{{ method_field('PATCH') }} 
				
				<div class="form-group">
					{!! Form::text('project_id',$project->id,['class' => 'form-control','id' => 'project_id', 'placeholder' => 'Project ID', 'readonly']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('project_title',$project->project_title,['id' => 'project_title', 'class' => 'form-control', 'placeholder' => 'Project Title']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('project_template',$project->project_template,['id' => 'project_template', 'class' => 'form-control', 'placeholder' => 'Display Image']) !!}
				</div>
				<div class="form-group">
					{!! Form::textarea('project_description',$project->project_description,['id' => 'project_description','class' => 'form-control', 'rows' => 4, 'placeholder' => 'Project Description']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('','Publish Project?', ['class' => 'form-control']) !!}
					{!! Form::checkbox('project_status','yes',$project->project_status,['id' => 'project_status', 'class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Update',['class' => 'btn btn-primary form-control']) !!}
				</div>
				<br>
			{!! Form::close() !!}
	        
	        <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
	    </div>
	</div>
</div>
@endsection