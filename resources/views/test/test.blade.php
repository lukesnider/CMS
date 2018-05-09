@extends('layouts.test')

@section('content')
<div class="container-fluid">
	@foreach($page->elements->where('type',1)->sortBy('position') AS $row)
		<div class="row">
			@foreach($page->elements->where('parent_id', $row->id) AS $column)
				<div class="col-{{ $column->x_size }}">
					{!! $column->content !!}
				</div>
			@endforeach
		</div>
	@endforeach
</div>
@endsection
