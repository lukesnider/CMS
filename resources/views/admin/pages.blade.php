@extends('layouts.admin.layout')

@section('content')
<div id="pages-display" class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">All Pages</h3>
			  </div>
			  <div class="panel-body">
					<ul class="list-group">
						@foreach($pages AS $page)
							<button data-page-id="{{ $page->id }}" v-on:click="show_panel = {{ $page->id }}" class="list-group-item page-list-item" >
								<div class="row">
									<div class="col-md-10">
										<a class="design-view-link" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Design View" href="{{ route('admin.page', ['id' => $page->id]) }}">{{ $page->title }}</a>
									</div>		
									<div  class="col-md-1">
										@if($page->status == 2)
											<span  class="badge badge-success">Live</span>
										@else
											<span class="badge badge-secondary">Draft</span>
										@endif
										
									</div>
								</div>
							</button>

							
						@endforeach
					</ul>
				</div>
			</div>
	
			
		</div>		
		<div class="col-md-6">
			@foreach($pages AS $page)

				<div class="card" v-if="show_panel == {{ $page->id }}">
					<div class="card-body">
						<h3 class="card-title">Page Info</h3>
						<form action="{{ route('admin.pages.edit') }}" method="POST">
							{{ csrf_field() }}
							<input hidden class="hidden" name="page_id" value="{{ $page->id }}" />
							<div class="form-group">
								<label for="">Slug</label>
								<p v-if="show_slug != {{ $page->id }}" class="slug_p" >{{ $page->slug }}    <button data-page-id="{{ $page->id }}" v-on:click="show_slug = {{ $page->id }}" id="edit_slug_button" type="button" class="btn btn-link"><h6><span class="label label-default">Edit</span></h6></button></p>
								<input v-if="show_slug == {{ $page->id }} " type="text" class="page_slug form-control"  value="{{ $page->slug }}" name="slug">
							</div>
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" class="form-control" value="{{ $page->title }}" name="title">
							</div>

							<div class="form-group">
								<label for="">Status</label>
								<select class="form-control" name="status">
								  <option value=""></option>
								  <option value="1" @if($page->status == 1) selected="selected" @endif>Draft</option>
								  <option value="2" @if($page->status == 2) selected="selected" @endif>Live</option>
								</select>
							</div>
							  <div class="checkbox">
								<label>
								  <input type="checkbox" name="index_page" @if($page->id == $index_page) checked @endif> Set as static front page.
								</label>
							  </div>
							<button type="submit" class="btn btn-default">Save</button>
						</form>
					</div>
				</div>
			@endforeach

			
		</div>
	</div>
</div>

@push('scripts-admin')
<script type="text/javascript">
	$(document).ready(function(){
	    $(".design-view-link").hover(function(){
		
		$(this).popover('toggle');
	    });
	});



	var pages = new Vue({
	  el: '#pages-display',
	  data: {
	    show_panel: 0,
	    show_slug: 0
	  }
	})


</script>
@endpush
@endsection
