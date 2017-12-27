@extends('layouts.admin.layout')

@section('content')

<!--<form action="{{ route('admin.page.edit') }}" method="POST">-->
{{ csrf_field() }}
<div id="page-template" class="container">

		@foreach($page->elements->where('parent_id',0)->sortBy('position') AS $row)
		<div id="{{ $row->id }}" class="row" 
			style=" @if($row->metaData)  background-color:{{ $row->metaData->background_color }}; color:{{ $row->metaData->color }}; @endif ">

			@foreach($page->elements->where('type', 2)->where('parent_id', $row->id)->sortBy('position') AS $col)
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#column_{{ $col->id }}">Edit Column</button>
			
				<div id="{{ $col->id }}" class="col-md-{{ $col->x_size }}"  @if($col->metaData) style="background-color:{{ $col->metaData->background_color }};color:{{ $col->metaData->color }};height:{{$col->y_size}}%;border:{{ $col->metaData->border }}" @endif>
					@if($col->content($col->id))
						@foreach($col->content($col->id) AS $content)
							{!! $content->metaData->content !!}						
						@endforeach
					@endif
				</div>
				<div id="column_{{ $col->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="column_{{ $col->id }}" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="form-group">
							
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		@endforeach

	<div class="row">
		<div class="col-md-2 offset-md-5">
			<button type="button" class="btn btn-default add_row_button">Add Row</button>
		</div>
	</div>
	<div class="row">
		<button id="save_page_state" type="button" class="btn btn-default">Save</button>
	</div>

</div>
<!--</form>-->

@push('scripts-admin')
<script type="text/javascript">

	$(document).ready(function(){

			$("#page-template").on('keydown', 'textarea', function(e) {
			if(e.keyCode === 9) {
					var start = this.selectionStart;
					var end = this.selectionEnd;

					var $this = $(this);
					var value = $this.val();

					$this.val(value.substring(0, start)
											+ "\t"
											+ value.substring(end));

					this.selectionStart = this.selectionEnd = start + 1;
					e.preventDefault();
			}
		});
	});


</script>
@endpush
@endsection
