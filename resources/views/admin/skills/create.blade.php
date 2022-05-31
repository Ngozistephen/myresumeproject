 <!-- Modal For Create Skill-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('admin.skills.store')}}" method="post" id="createSkillForm">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">language/framework Name</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input  name="lang_name"  class="form-control" style="margin-bottom: 30px" placeholder="language/framework Name">


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
          <button type="submit" form="createSkillForm" class="btn btn-primary">Save</button>
        </div>

        @csrf 
      </form>
    </div>
  </div>
</div> 