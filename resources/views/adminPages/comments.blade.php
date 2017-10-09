@extends('layouts.app')

@section('content')
	<div id="info_header" >
		USER AND CLIENT FEEDBACK, <b style="color: red;">PAY ATTENTION!!!</b>
	</div>
	<div class="comments_container">
		<ul>
			@foreach ($comment_data as $cmnt)
				<li>
					<div>
						<img src="{{ url('/images/marker.png') }}" class="pull-left marker" height="20px" width="15px"/>
						<p>{{ $cmnt->comment }} <b style="color: #f7c546; display: inline-block;">Posted by</b> <span class="badge">{{ $cmnt->user->name }}</span></p>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
	<div class="row">
	    <div class="text-center col-xs-10 col-xs-offset-1">
	      {{ $comment_data->links() }}
	    </div>
	</div>
@endsection