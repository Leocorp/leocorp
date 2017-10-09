@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div>
	        <h4 id="info_header">DELETING >> {{ $vtour->vtour_title }}</h4>
	    </div>
	    <div>
	        {!! Form::open(['url' => 'virtual_tour/{{ $vtour->id }}', 'method' => 'DELETE']) !!}
	        	 
			    @if (count($errors))
				<ul class="warning">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
				
				<div class="form-group">
					{!! Form::text('vtour_id',$vtour->id,['class' => 'form-control','id' => 'vtour_id', 'placeholder' => 'VTour ID', 'readonly']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('vtour_title',$vtour->vtour_title,['id' => 'vtour_title', 'class' => 'form-control', 'placeholder' => 'VTour Title', 'readonly']) !!}
					{!! Form::text('vtour_path',$vtour->vtour_path,['id' => 'vtour_path', 'class' => 'form-control', 'placeholder' => 'VTour Path', 'readonly', 'hidden']) !!}
					{!! Form::select('vcat_id',$vcat_list,$vtour->v_category_id,['id' => 'vcat_id', 'class' => 'form-control', 'placeholder' => 'VCat ID', 'readonly', 'hidden']) !!}
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