<div id="editColumnModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editColumnModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Column</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <!--<div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>-->		  <input type="hidden" class="hidden" id="editColumnEditorId" value="" />
          <div class="form-group">
            <label for="message-text" class="col-form-label">Content:</label>
            <textarea id="editColumnEditor" class="form-control summernote"></textarea>
          </div>
        </form>
      </div>      <div class="modal-footer">	  <button id="editColumnEditorSave" type="button" class="btn btn-light" data-dismiss="modal">Save</button>      </div>    </div>
  </div>
</div>