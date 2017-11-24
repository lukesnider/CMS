@extends('layouts.admin.layout')

@section('content')

<!--<form action="{{ route('admin.page.edit') }}" method="POST">-->
{{ csrf_field() }}
<div id="page-template" class="container">


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
						<label for="">Background:</label>
			    		<input :data-element-id="elementId()" :name="nameAttr(elementId(),'background')" type="text" class="form-control row-background" v-model="this.background">
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
		<button  v-on:click="postData()" id="save_page_state" type="button" class="btn btn-default">Save</button>
	</div>

</div>
<!--</form>-->

@push('scripts-admin')
<script type="text/javascript">
	$(document).ready(function(){
		$('#page-template').on('keyup','.row-height', function(){
			id = $(this).attr('data-element-id');
			value = $(this).val();
			$(this).closest('.row.new-element').css('height', value+'%');
		});
		$('#page-template').on('keyup','.row-width', function(){
			id = $(this).attr('data-element-id');
			value = $(this).val();
			$(this).closest('.row.new-element').css('width', value+'%');
		});		
		$('#page-template').on('keyup','.row-background', function(){
			id = $(this).attr('data-element-id');
			value = $(this).val();
			$(this).closest('.row.new-element').css('background', value);
		});
	});

	const rows = new Vuex.Store({
	  state: {
	    count: 0,
	    rowIds: {{ $next_id }},
	    postData: {rows: 
				[
					{id: 7, height: 100, width: 100 },
					{id: 8, height: 300, width: 200 }
		
				],
			columns: 
				[
					{id: 10, height: 300, width: 300},
					{id: 11, height: 400, width: 400}			
				]
			}
	  },
	  mutations: {
	    increment_count (state) {
	      state.count++
	    },	    
		increment_id (state) {
	      state.rowIds++
	    },
		
	  },
	  getters: {
	    allPostData: state => {
	      return state.postData
	    }
	  }
	})

	var page = new Vue({
	  el: '#page-template',
	  methods: {
	  	addRow: function() {
			rows.commit('increment_count')
			rows.commit('increment_id')
		},
		postData: function() {
			axios({
			  headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'  },
			  method: 'POST',
			  url: '/admin/page/edit',
			  data: rows.getters.allPostData
			}).then(function(response) {
			  console.log(response)
			});
			
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
			background: 'white',
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
