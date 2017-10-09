@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div>
	        <h4 id="info_header">VT| UPLOAD >> ...</h4>
	    </div>
	    <?php $tour_var = false; ?>
	    <div>
	        {!! Form::open(['url' => 'virtual_tour/upload', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}	
				<div class="form-group">
					<p>Tour Title:</p>
					{!! Form::text('vtour_title','',['id' => 'vtour_title', 'class' => 'form-control', 'placeholder' => 'VTour Title']) !!}
				</div>
				<div class="form-group">
					<p>Thumbnail Representative:</p>
					{!! Form::file('vtour_template',['id' => 'vtour_template']) !!}
				</div>
				<div class="form-group">
					<p>Type:</p>
					{!! Form::select('v_category_id',$vcat_list,'',['id' => 'v_category_id', 'class' => 'form-control', 'placeholder' => 'Choose Category']) !!}
				</div>
				
				<div class="form-group">
					<p>Location of Tour Folder/ WebLink:</p>
					{!! Form::text('vtour_path','',['id' => 'vtour_path', 'class' => 'form-control', 'placeholder' => 'VTour Path']) !!}
				</div>
				
				<div class="form-group">
					<p>About the Tour:</p>
					{!! Form::textarea('vtour_description','',['id' => 'vtour_description','class' => 'form-control', 'rows' => 4, 'placeholder' => 'What purpose does this tour accomplish?']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('','Publish Tour?', ['class' => 'form-control']) !!}
					{!! Form::checkbox('vtour_status','yes','',['id' => 'vtour_status', 'class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Upload',['class' => 'btn btn-primary form-control']) !!}
				</div>
				<br>
			{!! Form::close() !!}
	        
	        <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
	    </div>
	</div>
</div>
@endsection

@section('scripts')
	
@endsection