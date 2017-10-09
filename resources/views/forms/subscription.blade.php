<div class="row">
	<div id="subcription_form" class="col-xs-8 col-xs-offset-2 modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="info_header">Subscribe To LEOCORP</h4>
                </div>
                <div class="modal-body">
	                {!! Form::open(['url' => 'subscribe', 'method' => 'post']) !!}    
					    @if (count($errors))
						<ul class="warning">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
						@endif
						<div class="form-group">
							{!! Form::text('email','',['class' => 'form-control', 'placeholder' => 'Enter your email address here']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Subscribe',['class' => 'btn btn-primary form-control']) !!}
						</div>
						<br>
					{!! Form::close() !!}
	                
                    <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
</div>