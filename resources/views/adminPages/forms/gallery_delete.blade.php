@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div>
	        <h4 id="info_header">DELETING >> {{ $image->image_title }}</h4>
	    </div>
	    <div>
	        {!! Form::open(['url' => 'gallery/{{ $image->id }}', 'method' => 'DELETE']) !!}
	        	 
			    @if (count($errors))
				<ul class="warning">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
				
				<div class="form-group">
					{!! Form::text('image_id',$image->id,['class' => 'form-control','id' => 'image_id', 'placeholder' => 'Image ID', 'readonly']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('image_title',$image->image_title,['id' => 'image_title', 'class' => 'form-control', 'placeholder' => 'Image Title', 'readonly']) !!}
					{!! Form::text('image_path',$image->image_path,['id' => 'image_path', 'class' => 'form-control', 'placeholder' => 'Image Path', 'readonly', 'hidden']) !!}
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