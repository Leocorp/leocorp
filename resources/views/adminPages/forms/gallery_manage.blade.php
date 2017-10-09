<div class="row">
	<div id="gallery_manage_form" class="col-xs-10 col-xs-offset-1 modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="info_header">MANAGE GALLERY</h4>
                </div>
                <div class="modal-body">
	                <a href="/gallery/view" class="btn btn-success">VIEW IMAGES</a> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#gallery_upload_form">UPLOAD IMAGE</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
</div>
@include('adminPages.forms.gallery_upload')