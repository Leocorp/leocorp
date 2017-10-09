@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div>
	        <h4 id="info_header">VT| EDITING >> {{ $vtour->vtour_title }}</h4>
	    </div>
	    <div>
	        {!! Form::open(['url' => 'virtual_tour/{{ $vtour->id }}', 'method' => 'POST']) !!}
	        
	        	{{ method_field('PATCH') }} 
	        	 
			    @if (count($errors))
				<ul class="warning">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
				
				<div class="form-group">
					{!! Form::text('vtour_id',$vtour->id,['class' => 'form-control','id' => 'vtour_id', 'placeholder' => 'Image ID', 'readonly']) !!}
				</div>
				<div class="form-group">
					<p>Tour Title:</p>
					{!! Form::text('vtour_title',$vtour->vtour_title,['id' => 'vtour_title', 'class' => 'form-control', 'placeholder' => 'Image Title']) !!}
				</div>
				<div class="form-group">
					<p>Type of Tour:</p>
					{!! Form::select('v_category_id',$vcat_list,$vtour->v_category_id,['id' => 'v_category_id', 'class' => 'form-control', 'placeholder' => 'Category ID']) !!}
				</div>
				<div class="form-group">
					<p>Location of Tour:</p>
					{!! Form::text('vtour_path',$vtour->vtour_path,['id' => 'vtour_path', 'class' => 'form-control', 'placeholder' => 'VTour Path']) !!}
				</div>
				<div class="form-group">
					<p>Thumbnail Representative:</p>
					{!! Form::text('vtour_template',$vtour->vtour_template,['id' => 'vtour_template', 'class' => 'form-control', 'placeholder' => 'VTour Template']) !!}
				</div>
				<div class="form-group">
					<p>About the Tour:</p>
					{!! Form::textarea('vtour_description',$vtour->vtour_description,['id' => 'vtour_description','class' => 'form-control', 'rows' => 4, 'placeholder' => 'Image Description']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('','Publish Tour?', ['class' => 'form-control']) !!}
					{!! Form::checkbox('vtour_status','yes',$vtour->vtour_status,['id' => 'vtour_status', 'class' => 'form-control']) !!}
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