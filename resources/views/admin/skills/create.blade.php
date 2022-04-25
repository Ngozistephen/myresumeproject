@extends('layout.admin')

    @section('page-title', 'Create')

@section('scripts')
    {{-- <script src="/js/custom/fix-custom-file-select.js"></script> --}}
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

   

    <script>
        //Initialize Select2 Elements
      $('.select2').select2()
    </script>

    
    {{-- <script>
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
      fixCustomFileSelectLabel('ffeaturedImgInput');
    </script> --}}
    
@endsection
@section('content')
    
    
    
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Create Your Skill</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.skills.index')}}">Home</a></li>
                  <li class="breadcrumb-item active">Create Skill</li>
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
                                <h3 class="card-title">Compose New Skill</h3>
                            </div>
                            <!-- /.card-header -->
                        <div class="card-body">
                            
                            <form  method="post" action="#" id="createSkillForm" enctype="multipart/form-data">
                                    <div class="form-row" style="margin-bottom: 30px">
                                        <div class="col-md-12">
                                            <input  name="lang_name" class="form-control" placeholder="Language/ Framework Learned">
                                        </div>
                                        
                                    </div>
                                                                        
                                   

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
                                            <i class="fas fa-paperclip"></i> Language Image
                                            <input id="featuredImgInput" accept="image/*" type="file" name="lang_image">
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
                            
                            <button type="submit" form="createSkillForm" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                            </div>
                            <button type="reset"  form="createSkillForm" class="btn btn-danger"><i class="fas fa-trash"></i> Discard</button>
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