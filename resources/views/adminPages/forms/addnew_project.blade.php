<div class="row">
	<div id="addnew_project_form" class="col-xs-10 col-xs-offset-1 modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="info_header">ADD A NEW PROJECT</h4>
                </div>
                <div class="modal-body">
	                {!! Form::open(['url' => 'projects/new', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}    
						
						<div class="form-group vt_panel_header">
							<p>Project Title:</p>
							{!! Form::text('project_title','',['id' => 'project_title', 'class' => 'form-control', 'placeholder' => 'Project Title']) !!}
						</div>
						<div class="form-group vt_panel_header">
							<p>Display Image:</p>
							{!! Form::file('project_template','',['id' => 'project_template', 'class' => 'form-control', 'placeholder' => 'Project Template']) !!}
						</div>
						<div class="form-group">
							<p>Description:</p>
							{!! Form::textarea('project_description','',['id' => 'project_description', 'class' => 'form-control', 'placeholder' => 'Project Description', 'rows' => 4]) !!}
						</div>
						<div class="form-group">
							{!! Form::label('','Activate this Project',['class' => 'form-control']) !!}
							{!! Form::checkbox('project_status','yes', true,['id' => 'project_status', 'class' => 'form-control']) !!}
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