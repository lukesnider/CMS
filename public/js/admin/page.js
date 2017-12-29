var row_count = 0;

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
			$(this).closest('.build_row').append(getColumn(row_no, column_no++));
		 }else{
			$(this).closest('.build_row').append(getColumn(row_no, 1));
		 }
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
		'<div class="col build_col build_row_'+row_no+' build_col_'+column_no+'">'+
			'<button type="button" class="btn btn-default build_col-edit" data-toggle="modal" data-target="#editColumnModal" style="display:none;">Edit</button>'+
			'<p>Column</p>'+
		'</div>';
		
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