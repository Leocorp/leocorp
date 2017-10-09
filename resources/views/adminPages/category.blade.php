@extends('layouts.app')

@section('content')
	@if (!Auth::guest() && Auth::user()->is_admin)
		<div class="row">
		    <div>
		        <h4 id="info_header">MANAGE CATEGORY DATA</h4>
		        <p><b style="color: red;">ADMIN: MODE</b></p>
		    </div>
		</div>
		@foreach( $vcat as $cat)
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 vt_cell">
				{!! Form::open(['url' => 'category/$cat->id', 'method' => 'POST',]) !!}
					{{ method_field('PATCH') }}
					
					{!! Form::hidden('vcat_id',$cat->id)!!}
					
					<div class="form-group vt_panel_header">
						<p>Category Name:</p>
						{!! Form::text('vcat_name',$cat->vcat_name,['id' => 'vcat_name', 'class' => 'form-control', 'placeholder' => 'Category Name']) !!}
					</div>
					<div class="form-group">
						<p>Description:</p>
						{!! Form::textarea('vcat_description',$cat->vcat_description,['id' => 'vcat_description', 'class' => 'form-control', 'placeholder' => 'Category Description', 'rows' => 4]) !!}
					</div>
					<div class="form-group">
					{!! Form::label('','Publish Category?', ['class' => 'form-control']) !!}
					{!! Form::checkbox('vcat_status','yes',$cat->vcat_status,['id' => 'vcat_status', 'class' => 'form-control']) !!}
				</div>
					<div class="form-group">
						{!! Form::submit('Save',['class' => 'btn btn-success form-control', 'name' => 'submitbutton']) !!}
					</div>
					<div class="form-group">
						{!! Form::submit('Delete',['class' => 'btn btn-danger form-control', 'name' => 'submitbutton']) !!}
					</div>
					<br>
				{!! Form::close() !!}
			</div>
		</div>
		@endforeach
		
		<div class="row">
			<div class="col-xs-6 col-xs-offset-2 btn-admin">
		        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addnew_category_form">ADD NEW</a>
		    </div>
		</div>
		
	@endif
	<br>
	@include('adminPages.forms.addnew_category')
@endsection