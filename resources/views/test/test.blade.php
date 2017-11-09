@extends('layouts.test')

@section('content')
<div class="container">
	@foreach($page->elements->where('type',1) AS $row)
		<div class="row">
					
		</div>
	@endforeach
</div>
@endsection
