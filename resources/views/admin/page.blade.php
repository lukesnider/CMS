@extends('layouts.admin.layout')

@section('content')
<style>
.grid-item { width: 25%; }
.grid-item--width2 { width: 50%; }
</style>
<div class="container">
	<div class="row">
		<div id="left" class="col-md-6">
			<ul>
				<li>test 1</li>
				<li>test 2</li>
				<li>test 3</li>
			</ul>	
		</div>	
		<div id="right" class="col-md-6">
			<ul>
				<li>test 4</li>
				<li>test 5</li>
				<li>test 6</li>
			</ul>	
		</div>
	</div>
</div>
@push('scripts-admin')
<script type="text/javascript">
	$(document).ready(function(){

	});

	dragula([document.querySelector('#left'), document.querySelector('#right')]);


</script>
@endpush
@endsection
