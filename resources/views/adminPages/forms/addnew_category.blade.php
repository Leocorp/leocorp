<div class="row">
	<div id="addnew_category_form" class="col-xs-10 col-xs-offset-1 modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="info_header">ADD A NEW VIRTUAL TOUR CATEGORY</h4>
                </div>
                <div class="modal-body">
	                {!! Form::open(['url' => 'category/new', 'method' => 'POST']) !!}    
						
						<div class="form-group vt_panel_header">
							<p>Category Name:</p>
							{!! Form::text('vcat_name','',['id' => 'vcat_name', 'class' => 'form-control', 'placeholder' => 'Category Name']) !!}
						</div>
						<div class="form-group">
							<p>Description:</p>
							{!! Form::textarea('vcat_description','',['id' => 'vcat_description', 'class' => 'form-control', 'placeholder' => 'Category Description', 'rows' => 4]) !!}
						</div>
						<div class="form-group">
							{!! Form::label('','Activate this Category',['class' => 'form-control']) !!}
							{!! Form::checkbox('vcat_status','yes', true,['id' => 'vcat_status', 'class' => 'form-control']) !!}
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