@extends('layouts.admin.layout')

@section('content')

<!--<form action="{{ route('admin.page.edit') }}" method="POST">-->
{{ csrf_field() }}
<div id="page-template" class="container">		
		
		
		@foreach($page->elements->where('type',1)->sortBy('position') AS $row)
		<div id="{{ $row->id }}" class="row build_row">
			<button type="button" class="btn btn-primary build_row-add-column" style="display:none;">+</button>

			@foreach($page->elements->where('type', 2)->where('parent_id', $row->id)->sortBy('position') AS $col)
				<div id="{{ $col->id }}" class="col-md-{{ $col->x_size }} build_col">
				<button type="button" class="btn btn-default build_col-edit" data-toggle="modal" data-target="#editColumnModal" style="display:none;">Edit</button>
				
						{!! $col->content !!}						
				</div>
				<!--<div id="column_{{ $col->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="column_{{ $col->id }}" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="form-group">
							
							</div>
						</div>
					</div>
				</div>-->
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
	
	
	
	<div id="hidden_fields" class="hidden">
		
	</div>
	
	
	
</div>
<!--</form>-->

@include('modals.edit_column')


@push('scripts-admin')
<script>
var row_count = 0;

</script>
<script src="{{ asset('js/admin/page.js') }}"></script>
@endpush
@endsection
