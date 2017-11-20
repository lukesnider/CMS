@extends('layouts.admin.layout')

@section('content')
<style>
.grid-item { width: 25%; }
.grid-item--width2 { width: 50%; }
</style>
<form action="{{ route('admin.page.edit') }}" method="POST">
{{ csrf_field() }}
<div id="page-template" class="container">


		@foreach($page->elements->where('type',1)->sortBy('position') AS $row)
		<div id="{{ $row->id }}" class="row" 
			style="height:{{$row->y_size}}px; @if($row->metaData)  background-color:{{ $row->metaData->background_color }}; color:{{ $row->metaData->color }}; @endif ">

			@if($row->metaData)
				{{ $row->metaData->content }}
			@endif	
		
			@foreach($page->elements->where('type', 2)->where('parent_id', $row->id)->sortBy('position') AS $col)
				<div id="{{ $col->id }}" class="col-md-{{ $col->x_size }}"  @if($col->metaData) style="background-color:{{ $col->metaData->background_color }};color:{{ $col->metaData->color }};height:{{$col->y_size}}%;border:{{ $col->metaData->border }}" @endif>
					@if($col->metaData)
						{{ $col->metaData->content }}
					@endif
				</div>
		
			@endforeach
		</div>
		<div class="modal fade" id="{{ $row->id }}_oldRowEditModal" tabindex="-1" role="dialog" aria-labelledby="{{ $row->id }}_oldRowEditModal">
		 <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="">Edit Row</h4>
		      </div>
		      <div class="modal-body">
			<div class="form-group">
		    		<label for="">Height:</label>
		    		<input  data-element-id="{{$row->id}}" name="row[old][{{ $row->id }}][height]" value="{{ $row->y_size }}" type="text" class="form-control row-height" />
		    		<label for="">Width:</label>
		    		<input data-element-id="{{$row->id}}" name="row[old][{{ $row->id }}][width]" value="{{ $row->x_size }}" type="text" class="form-control row-width" />
				<div class="hidden">
				
				</div>
			</div>
		      </div>
		      <div class="modal-footer">
			<button data-element-id="{{ $row->id }}" type="button" class="btn btn-default rowEditModal" data-dismiss="modal">Done</button>
		      </div>
		    </div>
		  </div>
		</div>
		@endforeach

	<template-row v-for="row in rows.state.count"  :rownum="rows.state.count"  :rowid="rows.state.rowIds" inline-template>

		<div  :data-element-id="elementId()"  data-element-type="1" class="row new-element" :style="rowStyle()"  >
			@{{names[0]}}
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" :data-target="modalRowAttr(elementId(),false)">
  				Edit
			</button>			
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" :data-target="modalAddColAttr(elementId(),false)">
  				+
			</button>
			
			<!--Edit Row Modal -->
			<div class="modal fade" :id="modalRowAttr(elementId(),  true)" tabindex="-1" role="dialog" :aria-labelledby="modalRowAttr(elementId(), true)">
			 <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="">Edit Row</h4>
			      </div>
			      <div class="modal-body">
				<div class="form-group">
			    		<label for="">Height:</label>
			    		<input  :data-element-id="elementId()" :name="nameAttr(elementId(),'height')" type="text" class="form-control row-height" v-model="this.height">
			    		<label for="">Width:</label>
			    		<input :data-element-id="elementId()" :name="nameAttr(elementId(),'width')" type="text" class="form-control row-width" v-model="this.width">
					<div class="hidden">
						
					</div>
				</div>
			      </div>
			      <div class="modal-footer">
				<button :data-element-id="elementId()" type="button" class="btn btn-default rowEditModal" data-dismiss="modal">Done</button>
			      </div>
			    </div>
			  </div>
			</div>			
			
			<!-- Add Column Modal -->
			<div class="modal fade" :id="modalAddColAttr(elementId(),  true)" tabindex="-1" role="dialog" :aria-labelledby="modalAddColAttr(elementId(), true)">
			 <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="">Add Column</h4>
			      </div>
			      <div class="modal-body">
				<div class="form-group">
			    		<label for="">Height:</label>
			    		<input  :data-element-id="elementId()" type="text" class="form-control row-height" v-model="this.height">
			    		<label for="">Width:</label>
			    		<input :data-element-id="elementId()" type="text" class="form-control row-width" v-model="this.width">
					<div class="hidden">
						
					</div>
				</div>
			      </div>
			      <div class="modal-footer">
				<button :data-element-id="elementId()" type="button" class="btn btn-default rowEditModal" data-dismiss="modal">Done</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>


	</template-row>

	<div class="row">
		<div class="col-md-2 col-xs-offset-5">
			<button v-on:click="addRow()" type="button" class="btn btn-default add_row_button">Add Row</button>
		</div>
	</div>
	<div class="row">
		<button type="submit" class="btn btn-default">Save</button>
	</div>

</div>
</form>

@push('scripts-admin')
<script type="text/javascript">
	$(document).ready(function(){
		$('#page-template').on('change','.row-height', function(){
			id = $(this).attr('data-element-id');
			value = $(this).val();
			$(this).closest('.row.new-element').css('height', value+'%');
		});
		$('#page-template').on('change','.row-width', function(){
			id = $(this).attr('data-element-id');
			value = $(this).val();
			$(this).closest('.row.new-element').css('width', value+'%');
		});
	});

	const rows = new Vuex.Store({
	  state: {
	    count: 0,
	    rowIds: {{ $next_id }}
	  },
	  mutations: {
	    increment_count (state) {
	      state.count++
	    },	    
		increment_id (state) {
	      state.rowIds++
	    },
		
	  }
	})

	var page = new Vue({
	  el: '#page-template',
	  methods: {
	  	addRow: function() {
			rows.commit('increment_count')
			rows.commit('increment_id')
		}
	  }
	})


	Vue.component('template-row', {
	  props: ['rownum','rowid'],
	  data: function () {
	    	return {
			counter: this.rownum,
			element_id: this.rowid,
			names: ['height','width'],
			height: 100,
			width: 100,
			style: {width: '100%',height: '100%'}
	    	}
	  },
          methods: {
		nameAttr: function(id,value) {
			return "row[new]["+ id +"]["+ value +"]"	
		},
		classAttr: function(value) {
			return "element-"+value;	
		},
		valueAttr: function(type) {
			if(type == "height")
			{
			    return this.height
			}else{  return this.width  }
				
		},
		modalRowAttr: function(id, isID)
		{
			if(isID){return id+"_rowEditModal" }else{ return "#"+id+"_rowEditModal" }
			
		},		
		modalAddColAttr: function(id, isID)
		{
			if(isID){return id+"_addColModal" }else{ return "#"+id+"_addColModal" }
			
		},
		rowStyle: function()
		{
			return "height:"+this.height+"%; width:"+this.width+"%;"
		},
		elementId: function()
		{
			return this.element_id
		}
	  }

	})




</script>
@endpush
@endsection
