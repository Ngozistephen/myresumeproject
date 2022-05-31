<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <form action="#" method="post" id="createTrainingForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{Auth::user()->firstname }}  {{Auth::user()->lastname }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="card-header">
                            <div> Company Name</div>
                            <h3 class="training-info" id="company_namepreview"></h3>
                            {{-- {{$training->company_name}} --}}

                            <div>Certification</div>

                            <h3 class="training-info" id="certification_acquiredpreview"></h3>
                            {{-- {{$training->certification_acquired}} --}}
                        </div>
                        <!-- /.card-header --> 
                        <div class="card-body">
                            
                            <div class="mt-5" id="contentpreview">
                                {{-- {!!$training->content!!} --}}
                            </div>
                            
                        </div> 
                        <div class="card-header">
                            <div for="start_datepreview">Start Date</div>
                                <h2 class="training-info" id="start_datepreview"></h2>
                            {{-- {{$training->start_date}} --}}

                            <div for="end_datepreview">End Date</div>
                                <h2 class="training-info" id="end_datepreview"></h2>
                            {{-- {{$training->end_date}} --}}
                            
                        </div>                   
                    </div>

                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" form="createPreviewForm" class="btn btn-primary">Save</button>
                    </div>

                    @csrf 
                </form>
        </div>
    </div>
</div> 