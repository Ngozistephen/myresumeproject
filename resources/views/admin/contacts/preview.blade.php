<style>
    .flex-container{
          display: flex;
        background-color:#bd5d38;
          

        }
        
</style>


<div class="modal fade" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <form action="#" method="post" id="createPreviewContactForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{Auth::user()->firstname }}  {{Auth::user()->lastname }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="flex-container">

                                <div class="card-header" >
                                    <img class="user-info"   id="featuredImgInputpreview" style="border-radius: 50%"></img>
                                    {{-- src="/storage/{{$users->profile_img}}" --}}
                                </div>
                                <div class="card-header" style="align-items: center">
                                    <h3 class="user-info" id="">{{Auth::user()->firstname }}  {{Auth::user()->lastname }}</h3>
                            
                                    <h3 class="user-info" id="emailpreview"></h3>
                                </div>
                        </div>


                        <div class="card-header">
                            <div>Phone</div>
                            <h3 class="user-info" id="phone_numberpreview"></h3>

                            <div>Address</div>

                            <h3 class="user-info" id="addresspreview"></h3>
                        </div>
                        <!-- /.card-header --> 
                        <div class="card-body">
                            <div>Tell Us About yourself?</div>
                            <div class="mt-5" id="compose-textareapreview">
                               
                            </div>
                            
                        </div> 
                        <div class="card-header">
                            <div>Social Media</div>
                            <h3 class="user-info" id="social_medialinkspreview"></h3>

                        </div>
                                          
                    </div>

                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" form="createPreviewContactForm" class="btn btn-primary">Save</button>
                    </div>

                    @csrf 
                </form>
        </div>
    </div>
</div> 