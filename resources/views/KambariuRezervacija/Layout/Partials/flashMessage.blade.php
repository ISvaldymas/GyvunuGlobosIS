@if(Session::has('succsess'))
	<div class="alert alert-success alert-dismissible text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Pranešimas:</strong> {{ Session::get('succsess') }}
	</div>
@endif
<!-- Prideti naujus flashus pvz. error ir t.t.  -->