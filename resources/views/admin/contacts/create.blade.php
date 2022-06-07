<!-- Modal For Create Skill-->
<div class="modal fade" id="exampleModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <form method="post" id="createContactForm" action=" ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Admin Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input  name="address" id="address" class="form-control" style="margin-bottom: 30px" placeholder="Address">

                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control"data-inputmask="'mask': ['999-999-9999 [x99999]', '+99 99 99 9999[9]-9999']" data-mask="" placeholder="Phone Number">
                                </div>
                                <!-- /.input group -->
                            </div>
                        
                            <div class="form-group">
                                <textarea  id="compose-textarea" class="form-control" style="height: 100px">
                                </textarea>
                            </div>


                            <div class="form-group" id="social_medialinks">
                                <div class="row">
                                    <div class="col-md-6">
                                        Social Media Company:
                                    </div>
                                    <div class="col-md-6">
                                        Link:
                                    </div>
                                </div>
                                @for ($i=0; $i <= 3; $i++)
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="social_medialinks[{{ $i }}][key]" class="form-control" value="{{ old('social_medialinks['.$i.'][key]') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="social_medialinks[{{ $i }}][value]" class="form-control" value="{{ old('social_medialinks['.$i.'][value]') }}">
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip"></i> Profile Image
                                    <input id="featuredImgInput" accept="image/*" type="file" name="profile_img">
                                </div>

                                <label class="d-block" for="featuredImgInput"></label>
                                <p class="help-block">Max. 32MB</p>
                            </div>

                        
                        </div>

                        

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                        @csrf 
                    </form>
            </div>
        </div>
</div> 