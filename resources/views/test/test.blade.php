@extends('layouts.test')

@section('content')
<div class="container-fluid">
		
		
		@foreach($page->elements->where('type',1)->sortBy('position') AS $row)
		<div class="row">
			@foreach($page->elements->where('type', 2)->where('parent_id', $row->id)->sortBy('position') AS $col)
				<div class="col">				
						{!! $col->content !!}						
				</div>
			@endforeach
		</div>

		@endforeach
</div>
@endsection
