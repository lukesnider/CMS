
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
          <input type="hidden" id="build_col-edit-id" value="" />
          <div class="form-group">
            <label class="col-form-label">Width:(col)</label>
            <input type="text" class="form-control" id="build_col-edit-width">
          </div>
          <div class="form-group">
            <label class="col-form-label">Height:(%)</label>
            <input type="text" class="form-control" id="build_col-edit-height">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Content:</label>
            <textarea id="build_col-edit-content" class="form-control summernote"></textarea>
          </div>
      </div>
      <div class="modal-footer">
      <button id="build_col-edit-save"  type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close">Save</button>
      </div>
    </div>
  </div>
</div>