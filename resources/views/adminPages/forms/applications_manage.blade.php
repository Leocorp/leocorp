<div class="row">
	<div id="app_manage_form" class="col-xs-10 col-xs-offset-1 modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="info_header">MANAGE APPLICATIONS</h4>
                </div>
                <div class="modal-body">
	                <a href="/apps/view" class="btn btn-success">VIEW ALL APPS</a> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addnew_application_form">ADD NEW APP</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
</div>
@include('adminPages.forms.addnew_application')