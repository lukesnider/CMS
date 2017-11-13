@extends('layouts.admin.layout')

@section('content')
<style>
.grid-item { width: 25%; }
.grid-item--width2 { width: 50%; }
</style>
<div id="page-template" class="container">

	<div  class="draggabilly-container">
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
	@endforeach
	</div>

	<template-row v-for="row in row_count"  :rownum="rows.state.count"></template-row>

	<div class="row">
		<div class="col-md-2 col-xs-offset-5">
			<button v-on:click="addRow()" type="button" class="btn btn-default add_row_button">Add Row</button>
		</div>
	</div>
	
</div>

@foreach($page->elements AS $element)
	<input class="page-element hidden" data-element-id="{{ $element->id }}"  value=""/>
@endforeach

@push('scripts-admin')
<script type="text/javascript">
	$(document).ready(function(){

	});
	//function listener() {
	//  draggie = $(this).data('draggabilly');
	//  console.log($(this).parent());
	//  console.log( 'eventName happened', draggie.position.x, draggie.position.y );
	//}
	//var $draggable = $('.draggable').draggabilly({
	//	containment: '.draggabilly-container',
	//	grid: [ 50, 50 ]
	//})
	//$draggable.on( 'dragEnd', listener );

	const rows = new Vuex.Store({
	  state: {
	    count: 0
	  },
	  mutations: {
	    increment (state) {
	      state.count++
	    }
	  }
	})

	var page = new Vue({
	  el: '#page-template',
	  methods: {
	  	addRow: function() {
		rows.commit('increment')
	    }
	  }
	})


	Vue.component('template-row', {
	  props: ['rownum'],
	  data: function () {
	    	return {
			counter: this.rownum
	    	}
	  },
	  template: '<div :data-element-id="counter"  data-element-type="2" class="row new-element">ROW</div></div>'
	})

</script>
@endpush
@endsection
