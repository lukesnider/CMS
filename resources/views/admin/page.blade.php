@extends('layouts.admin.layout')

@section('content')

<!--<form action="{{ route('admin.page.edit') }}" method="POST">-->
{{ csrf_field() }}
<div id="page-template" class="container">		

	@foreach($page->elements->where('type',1)->sortBy('position') AS $key => $row)
		<div class="row build_row" data-row-no="{{ $key }}">
			<button type="button" class="btn btn-primary build_row-add-column" style="display:none;">+</button>
			@php $col_count = 0 @endphp
			@foreach($page->elements->where('parent_id', $row->id) AS $column)
				<div class="col-{{ $column->x_size }} build_col build_row_{{ $key }} build_col_{{ $col_count }}">
					<button type="button" class="btn btn-default build_col-edit" data-toggle="modal" data-target="#editColumnModal" style="display:none;">Edit</button>
					{!! $column->content !!}
				</div>
				@php $col_count++ @endphp
			@endforeach
		</div>
	@endforeach


</div>
<div id="" class="container">		

	<div class="row">
		<div class="col-md-2 offset-md-5">
			<!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addColumnModal">+</button>-->
			<button type="button" class="btn btn-default" id="addRowButton">Add Row</button>
		</div>
	</div>
	<div class="row">
		<button id="save_page_state" type="button" class="btn btn-default">Save</button>
	</div>
	
	
	
	<div id="hidden_fields" class="hidden" style="display:none;">
		@foreach($page->elements->where('type',2) AS $element)
			<textarea id="column_content_{{ $element->id }}">{!! $element->content !!}</textarea>
		@endforeach
	</div>
	
	
	
</div>
<!--</form>-->

@include('modals.edit_column')


@push('scripts-admin')
<script src="{{ asset('js/admin/page.js') }}"></script>
@endpush
@endsection
