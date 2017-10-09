@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div>
	        <h4 id="info_header">APPLICATION| EDITING >> {{ $application->app_name }}</h4>
	    </div>
	    <div>
	        {!! Form::open(['url' => 'apps/{{ $application->id }}', 'method' => 'POST']) !!}
	        
	        	{{ method_field('PATCH') }} 
				
				<div class="form-group">
					{!! Form::text('app_id',$application->id,['class' => 'form-control','id' => 'app_id', 'placeholder' => 'App ID', 'readonly']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('app_name',$application->app_name,['id' => 'app_name', 'class' => 'form-control', 'placeholder' => 'Application Name']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('app_template',$application->app_template,['id' => 'app_template', 'class' => 'form-control', 'placeholder' => 'Display Image']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('app_path',$application->app_path,['id' => 'app_path', 'class' => 'form-control', 'placeholder' => 'Application Package']) !!}
				</div>
				<div class="form-group">
					{!! Form::textarea('app_description',$application->app_description,['id' => 'app_description','class' => 'form-control', 'rows' => 4, 'placeholder' => 'Application Description']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('','Publish Application?', ['class' => 'form-control']) !!}
					{!! Form::checkbox('app_status','yes',$application->app_status,['id' => 'app_status', 'class' => 'form-control']) !!}
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