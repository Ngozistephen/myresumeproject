<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post" id="editSkillForm">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabelEdit">Language Name Edit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <input id="editSkillControl"  name="lang_name" style="margin-bottom: 30px"  class="form-control" placeholder="Language/ Framework Name">

                <div class="form-group">
                      <div class="btn btn-default btn-file">
                          <i class="fas fa-paperclip"></i> Language Image
                          <input id="featuredImgInput" accept="image/*" type="file" name="lang_image">
                      </div>

                      <label class="d-block" for="featuredImgInput"></label>
                      <p class="help-block">Max. 32MB</p>
                </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" form="editSkillForm" class="btn btn-primary">Save changes</button>
          </div>

          @csrf 
        </form>
      </div>

    </div>
  </div>