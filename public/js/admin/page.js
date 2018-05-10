var row_count = 0;
var id = 0;
var width = 12;
var height = 100;

$(document).ready(function(){
	
	$('.build_row').each(function(){
		row_count++;
	});
	console.log(row_count);
	$('#addRowButton').on('click',function(){
		$('#page-template').append(getRow());		
		
	});
	
	$('#page-template').on('mouseenter', '.build_col',
	  function () {
		$(this).find('.build_col-edit').show();
	  }
	);
		
	$('#page-template').on('mouseleave', '.build_col',
	  function () {
		$(this).find('.build_col-edit').hide();
	  }
	);	
	
	
	$('#page-template').on('mouseenter', '.build_row',
	  function () {
		$(this).find('.build_row-add-column').show();
	  }
	);
	
	$('#page-template').on('mouseleave', '.build_row',
	  function () {
		$(this).find('.build_row-add-column').hide();
	  }
	);
	
	$('#page-template').on('click','.build_row-add-column',function(){
		 row_no = $(this).closest('.build_row').attr('data-row-no');
		 column_no = $('.build_row_'+row_no).length;
		 if(column_no > 0){
			$(this).closest('.build_row').append(getColumn(row_no, column_no++))
			$('#hidden_fields').append(getColumnInputs(column_no++));			
		 }else{
			$(this).closest('.build_row').append(getColumn(row_no, 1));
			$('#hidden_fields').append(getColumnInputs(1));
		 }
	});

	$('#page-template').on('click', '.build_col-edit',
		function () {
			id = $(this).attr('data-column-id');
			width = $('#column_width_'+id).val();
			height = $('#column_height_'+id).val();

			$('#build_col-edit-id').val(id);
			
			$('#build_col-edit-width').val($('#column_width_'+id).val());
			$('#build_col-edit-height').val($('#column_height_'+id).val());
			$('#build_col-edit-content').summernote("code", $('#column_content_'+id).val());
		}
	);

	$('#build_col-edit-save').on('click',function(){

		$('#column_width_'+id).val($('#build_col-edit-width').val());
		$('#column_height_'+id).val($('#build_col-edit-height').val());
		$('#column_content_'+id).val($('#build_col-edit-content').val());
		
		$('#build_col_'+id+'-column').removeClass('col-'+width);
		$('#build_col_'+id+'-column').addClass('col-'+$('#build_col-edit-width').val());
		
		$('#build_col_'+id+'-live-content').empty();
		$('#build_col_'+id+'-live-content').append($('#build_col-edit-content').val());
		

		$('#build_col-edit-content').val("");
		$('#build_col-edit-width').val("");
		$('#build_col-edit-height').val("");

	});
	
	
	$('.summernote').summernote({
	  height: 500,   
	  popover: false,
	  codemirror: { 
		theme: 'monokai'
	  }
	});
	
});

var getColumn = function(row_no, column_no)
{
	html = 	
<<<<<<< HEAD
		'<div class="col build_col build_row_'+row_no+' build_col_'+column_no+'">'+
			'<button data-col-id="'+column_no+'" type="button" class="btn btn-default build_col-edit" data-toggle="modal" data-target="#editColumnModal" style="display:none;">Edit</button>'+
			'<div id="build_col-content-'+column_no+'">'+
				'<p>Column</p>'+
			'</div>'+
=======
		'<div class="col-'+width+' build_col build_row_'+row_no+' build_col_'+column_no+'">'+
			'<button type="button" class="btn btn-default build_col-edit"  data-column-id="'+row_no+'" data-toggle="modal" data-target="#editColumnModal" style="display:none;">Edit</button>'+
			'<p>Column</p>'+
>>>>>>> master
		'</div>';
		
	return html;
}
var getColumnInputs = function(col_no){
	html = 
			'<textarea name="element['+col_no+'][content]"  id="column_content_'+col_no+'">{!! $element->content !!}</textarea>'+
			'<input name="element['+col_no+'][width]" type="hidden" id="column_width_'+col_no+'" value="'+width+'" />'+
			'<input name="element['+col_no+'][height]" type="hidden" id="column_height_'+col_no+'" value="'+height+'" />';

	return html;
}
var getRow = function()
{
	row_count++;
	
	html = 	
	'<div class="row build_row" data-row-no="'+row_count+'">'+
		'<button type="button" class="btn btn-primary build_row-add-column" style="display:none;">+</button>'+
		'<p>Row</p>'+
	'</div>';
	
	return html;
}
