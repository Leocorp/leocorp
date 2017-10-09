<div class="row">
	<div id="addnew_application_form" class="col-xs-10 col-xs-offset-1 modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="info_header">ADD A NEW APPLICATION</h4>
                </div>
                <div class="modal-body">
	                {!! Form::open(['url' => 'apps/new', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}    
						
						<div class="form-group vt_panel_header">
							<p>Application Name:</p>
							{!! Form::text('app_name','',['id' => 'app_name', 'class' => 'form-control', 'placeholder' => 'App Name']) !!}
						</div>
						<div class="form-group vt_panel_header">
							<p>Display Image:</p>
							{!! Form::file('app_template','',['id' => 'app_template', 'class' => 'form-control', 'placeholder' => 'Display Image']) !!}
						</div>
						<div class="form-group vt_panel_header">
							<p>Application Package:</p>
							{!! Form::file('app_path','',['id' => 'app_path', 'class' => 'form-control', 'placeholder' => 'Application Package']) !!}
						</div>
						<div class="form-group">
							<p>Description:</p>
							{!! Form::textarea('app_description','',['id' => 'app_description', 'class' => 'form-control', 'placeholder' => 'Application Description/ Function', 'rows' => 4]) !!}
						</div>
						<div class="form-group">
							{!! Form::label('','Activate this Project',['class' => 'form-control']) !!}
							{!! Form::checkbox('app_status','yes', true,['id' => 'app_status', 'class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('ADD',['class' => 'btn btn-primary form-control']) !!}
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