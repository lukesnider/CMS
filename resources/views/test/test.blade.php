@extends('layouts.test')

@section('content')
<div class="container-fluid">
	@foreach($page->elements->where('parent_id',0)->sortBy('position') AS $row)
	<div id="{{ $row->id }}" class="row" 
		style=" @if($row->metaData)  background-color:{{ $row->metaData->background_color }}; color:{{ $row->metaData->color }}; @endif ">

		@foreach($page->elements->where('type', 2)->where('parent_id', $row->id)->sortBy('position') AS $col)
			<div id="{{ $col->id }}" class="col-md-{{ $col->x_size }}"  @if($col->metaData) style="background-color:{{ $col->metaData->background_color }};color:{{ $col->metaData->color }};height:{{$col->y_size}}%;border:{{ $col->metaData->border }}" @endif>
				@if($col->content($col->id))
					@foreach($col->content($col->id) AS $content)
						{!! $content->metaData->content !!}						
					@endforeach
				@endif
			</div>
	
		@endforeach
	</div>
	@endforeach
</div>
@endsection
