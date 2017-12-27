
$(document).ready(function(){

	var editor_count = 0;
	
	$('#save_page_state').on('click', function(){
		editor_count++;
		$('#page-template').append('<textarea id="editor_'+editor_count+'"></textarea>');
		CodeMirror.fromTextArea($('#editor_'+editor_count).get(0), {
			lineNumbers: true,
			theme: "monokai"
		});		
	});
	//$('.summernote').summernote({
	//  height: 200,   
	//  codemirror: { 
	//	theme: 'monokai'
	//  }
	//});
	
	
	//$("#page-template").on('keydown', 'textarea', function(e) {
	//if(e.keyCode === 9) {
	//		var start = this.selectionStart;
	//		var end = this.selectionEnd;
	//
	//		var $this = $(this);
	//		var value = $this.val();
	//
	//		$this.val(value.substring(0, start)
	//								+ "\t"
	//								+ value.substring(end));
	//
	//		this.selectionStart = this.selectionEnd = start + 1;
	//		e.preventDefault();
	//}
});