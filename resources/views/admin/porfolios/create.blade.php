@extends('layout.admin')

    @section('page-title', 'Create')

@section('scripts')
    {{-- <script src="/js/custom/fix-custom-file-select.js"></script> --}}
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    {{-- is for data range picker --}}
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <!-- date-range-picker -->
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

    <script>

      //Date range picker
      const el = $('input[name="dates"]').daterangepicker();
     

      console.log(el)
    </script>

    <script>
        //Initialize Select2 Elements
      $('.select2').select2()
    </script>

    <script>
      $(function () {
        //Add text editor
        $('#compose-textarea').summernote({
          placeholder: 'write your content here',
          focus:true,
          minHeight:100
        });
       
        $('#compose-textarea').summernote('code','');

      })
    </script>
    
    <script>
      $('#createPorfolioForm').submit(function(e){
          e.preventDefault();
          $('#formErrs').remove();
          var formData = new FormData(this);

          // for the data picker
          const dates = $('input[name="dates"]').val().split('-');
          // sliptting the two dates
          const startdate = dates[0].trim();
          const enddate = dates[1].trim();

          var content = $('#compose-textarea').summernote('code');

          formData.delete('dates');
        //  deleting the dates and getting the enddate and startdate
          formData.append('content', content);
          formData.append('endDate', enddate);
          formData.append('startDate', startdate);

          axios.post("{{route('admin.porfolios.store')}}", formData).then(function(response){
            // request successful, the post was saved.
            window.location.reload();
            // passing true inside the reload will wipe out all the data in the post or live it empty.

          }).catch(function(error){
            // an errror has occurred
      
            if(error.response){
           

              var response = error.response;
              if(response.status == 422){
                  var errs = Object.values(response.data.errors)
                              .reduce(function(acc, val){
                                  return acc.concat(val);
                              },[]);
                  var ul = $('<ul></ul>').addClass('list-unstyled alert alert-danger').attr({id: 'formErrs'})
                  for(var err of errs){
                      var li = $('<li></li>').text(err)
                      ul.append(li);
                  }
                  $('#createPorfolioForm').prepend(ul);
              }
            }else{
              var ul = $('<ul></ul>').addClass('list-unstyled alert alert-danger').attr({id: 'formErrs'});
              var li = $('<li></li>').text('An unexpected error has occured please try again later');
              ul.append(li);
              $('#createPorfolioForm').prepend(ul);
            } 
          });
      });
      fixCustomFileSelectLabel('featuredImgInput'); 
    </script>
    
@endsection
@section('content')
    
    
    
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Create Your Porfolio</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.porfolios.index')}}">Home</a></li>
                  <li class="breadcrumb-item active">Create Post</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Compose New Porfolio</h3>
                            </div>
                            <!-- /.card-header -->
                        <div class="card-body">
                            
                            <form  method="post" action="{{route('admin.porfolios.store')}}" id="createPorfolioForm" enctype="multipart/form-data">
                                    <div class="form-row" style="margin-bottom: 30px">
                                        <div class="col-md-6">
                                            <input  name="job_title" class="form-control" placeholder="Job Title">
                                        </div>
                                        <div class="col-md-6">
                                            <input  name="project_name" class="form-control" placeholder="Project Name">
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <textarea  id="compose-textarea" class="form-control" style="height: 300px">
                                        </textarea>
                                    </div>

                                    <!-- Date range -->
                                    
                                      <div class="form-group">
                                        <label>Date range</label>

                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="far fa-calendar-alt"></i>
                                            </span>
                                          </div>
                                          <input type="text" name="dates" class="form-control float-right" id="reservation">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                    

                                    
                                      <div class="form-group">
                                        <label>Select Language and Technologies Used For Project</label>
                                        <div class="select2-purple">
                                          <select class="select2" name="skill" multiple="multiple" data-placeholder="Select a Language/Technologies" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            @foreach($skills as $skill)
                                              <option value="{{$skill->id}}">{{$skill->lang_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                      </div> 
                                      <!-- /.form-group -->
                                   

                                    {{-- <div class="form-group">
                                        <select class="custom-select"  name="category">
                                        <option selected>Select category</option>  
                                        
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>    
                                        @endforeach
                                        </select>  
                                    </div>  --}}
                                    <div class="form-group">
                                        <div class="btn btn-default btn-file">
                                            <i class="fas fa-paperclip"></i> Feature Image
                                            <input id="featuredImgInput" accept="image/*" type="file" name="feature_img">
                                        </div>

                                        <label class="d-block" for="featuredImgInput"></label>
                                        <p class="help-block">Max. 32MB</p>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input   name="published" type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Publish</label>
                                        </div>
                                    </div>

                                @csrf
                            </form>
                        </div>
                        
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                            
                            <button type="submit" form="createPorfolioForm" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                            </div>
                            <button type="reset"  form="createPorfolioForm" class="btn btn-danger"><i class="fas fa-trash"></i> Discard</button>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
      <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>In the Year:</b> 2022
      </div>
      <strong>Ngozi Stephen: Helped Man<a href="#">StephenDev</a>.</strong> By His Grace I am What I am
    </footer>
  
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    
     
@endsection