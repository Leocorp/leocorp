<div class="row">
	<div id="gallery_upload_form" class="col-xs-10 col-xs-offset-1 modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="info_header">UPLOAD IMAGE TO GALLERY</h4>
                </div>
                <div class="modal-body">
	                {!! Form::open(['url' => 'gallery/upload', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}    
					    @if (count($errors))
						<ul class="warning">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
						@endif
						
						<div class="form-group">
							{!! Form::file('image','',['id' => 'image']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('image_title','',['id' => 'image_title', 'class' => 'form-control', 'placeholder' => 'Image Title']) !!}
						</div>
						<div class="form-group">
							{!! Form::textarea('image_description','',['id' => 'image_description','class' => 'form-control', 'rows' => 4, 'placeholder' => 'Say something about this image']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('','Activate this Image',['class' => 'form-control']) !!}
							{!! Form::checkbox('image_status','yes', true,['id' => 'image_status', 'class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Upload',['class' => 'btn btn-primary form-control']) !!}
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