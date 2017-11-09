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
							<li class="list-group-item">
								<div class="row">
									<div class="col-md-10">
										- <a href="{{ route('admin.page', ['id' => $page->id]) }}">{{ $page->title }}</a>
									</div>		
									<div class="col-md-1" v-on:click="ok = true">
										@if($page->status == 1)
											<span  class="label label-success">Live</span>
										@else
											<span class="label label-default">Draft</span>
										@endif
										
									</div>
								</div>
							</li>

							
						@endforeach
					</ul>
				</div>
			</div>
	
			
		</div>		
		<div class="col-md-6">
			@foreach($pages AS $page)

				<div class="panel panel-default" style="display:none;">
					<div class="panel-heading">
						<h3 class="panel-title">Page Info</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('admin.page.edit') }}" method="POST">
							{{ csrf_field() }}
							<input class="hidden" name="page_id" value="{{ $page->id }}" />
							<div class="form-group">
								<label for="">Slug</label>
								<p class="slug_p" >{{ $page->slug }}    <button id="edit_slug_button" type="button" class="btn btn-link"><h6><span class="label label-default">Edit</span></h6></button></p>
								<input type="text" class="page_slug form-control"  style="display:none;" value="{{ $page->slug }}" name="slug">
							</div>
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" class="form-control" value="{{ $page->title }}" name="title">
							</div>

							<div class="form-group">
								<label for="">Status</label>
								<select class="form-control" name="status">
								  <option value=""></option>
								  <option value="0" @if($page->status == 0) selected="selected" @endif>Draft</option>
								  <option value="1" @if($page->status == 1) selected="selected" @endif>Live</option>
								</select>
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
		
		$('#edit_slug_button').on('click',function(){
			$('p.slug_p').hide();
			$('input.page_slug').show();
		});

	});
	var pages = new Vue({
        el: '#pages-display',
        data: {
            pages: []
        }
    })


</script>
@endpush
@endsection
