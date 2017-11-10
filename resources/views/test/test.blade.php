@extends('layouts.test')

@section('content')
<div class="container-fluid">
	@foreach($page->elements->where('type',1)->sortBy('position') AS $row)
		<div class="row" 
			style="height:{{$row->y_size}}px; @if($row->metaData)  background-color:{{ $row->metaData->background_color }}; color:{{ $row->metaData->color }}; @endif ">
			@if($row->metaData)
				{{ $row->metaData->content }}
			@endif			
			@foreach($page->elements->where('type', 2)->where('parent_id', $row->id)->sortBy('position') AS $col)
				<div class="col-md-{{ $col->x_size }}"  @if($col->metaData) style="background-color:{{ $col->metaData->background_color }};color:{{ $col->metaData->color }};height:{{$col->y_size}}%;border:{{ $col->metaData->border }}" @endif>
					@if($col->metaData)
						{{ $col->metaData->content }}
					@endif
				</div>
			
			@endforeach
		</div>
	@endforeach
</div>
@endsection
