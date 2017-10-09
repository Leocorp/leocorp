<div class="footer">
    <div class="row">
        <div class="col-xs-6" id="lin_bar">
	        @include('forms.comment')
        </div>
        <div class="pull-right col-xs-6">
	        <p style="color: yellow;">In order to receive direct updates as and when they happen, click the button below to subscribe.</p>
	        <button type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#subcription_form" disabled>
	        Subscribe!
	        </button>
	        <br>
			<div>
				<p><b>Contact Us:</b>
					<a href="mailto:red-console@leocorp.net?subject=Enquiry" style="display: block;"><span class="glyphicon glyphicon-envelope">Mail</span></a>
					<span class="fa fa-whatsapp" style="display: inline-block;">+233-209-710-161</span>
					<span class="fa fa-whatsapp" style="display: inline-block;">+233-277-066-857</span>
				</p>
			</div>
			<!--p>ALL RIGHTS RESERVED. COPYRIGHT © 2017. Designed by <a href="http://leocorp.net">LEOCORP</a></p-->
        </div> 
    </div>
    @include('forms.subscription')
</div>