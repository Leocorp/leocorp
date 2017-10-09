{!! Form::open(['url' => 'comments', 'method' => 'post']) !!}    
	<div class="form-group">
        <label><span style="color: white; font-weight: bold">C&C</span></label>
    </div>
    @if (count($errors))
	<ul class="warning">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif
	<div class="form-group">
		{!! Form::textarea('comment','',['class' => 'comment form-control', 'placeholder' => 'We know we can do better, you tell us how ...', 'rows' => 3]) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Feedback',['class' => 'btn btn-primary form-control']) !!}
	</div>
	<br>
{!! Form::close() !!}

