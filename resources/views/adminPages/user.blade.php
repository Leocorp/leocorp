@extends('layouts.app')

@section('content')
	@if (!Auth::guest() && Auth::user()->is_admin)
		<div class="row">
		    <div>
		        <h4 id="info_header">MANAGE USER DATA</h4>
		        <p><b style="color: red;">ADMIN: MODE</b></p>
		    </div>
		</div>
		@foreach( $users as $user)
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 vt_cell">
				{!! Form::open(['url' => 'user/$user->id', 'method' => 'POST',]) !!}
					{{ method_field('PATCH') }}
					
					{!! Form::hidden('user_id',$user->id)!!}
					
					<div class="form-group vt_panel_header">
						<p>User Name:</p>
						{!! Form::text('name',$user->name,['id' => 'name', 'class' => 'form-control', 'placeholder' => 'User Name']) !!}
					</div>
					<div class="form-group">
						<p>Email:</p>
						{!! Form::text('email',$user->email,['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email Address']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('','Publish Category?', ['class' => 'form-control']) !!}
						{!! Form::checkbox('is_admin','yes',$user->is_admin,['id' => 'is_admin', 'class' => 'form-control']) !!}
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
		
	@endif
	<br>
@endsection