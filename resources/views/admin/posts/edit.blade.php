@extends('layout.admin')

    @section('page-title', 'Edit')

@section('scripts')
    <script src="/js/custom/fix-custom-file-select.js"></script>
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
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
    {{-- <script>
      $('#createPostForm').submit(function(e){
          e.preventDefault();
          $('#formErrs').remove();
          var formData = new FormData(this);

          var content = $('#compose-textarea').summernote('code');

          formData.append('content', content);
          

          axios.post("{{route('admin.posts.store')}}", formData).then(function(response){
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
                  $('#createPostForm').prepend(ul);
              }
            }else{
              var ul = $('<ul></ul>').addClass('list-unstyled alert alert-danger').attr({id: 'formErrs'});
              var li = $('<li></li>').text('An unexpected error has occured please try again later');
              ul.append(li);
              $('#createPostForm').prepend(ul);
            } 
          });
      });
      fixCustomFileSelectLabel('featuredImgInput');
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
                <h1>Create Post</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Home</a></li>
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
                                <h3 class="card-title">Compose New Post</h3>
                            </div>
                            <!-- /.card-header -->
                        <div class="card-body">
                            
                            <form  method="post" action="#" id="createPostForm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input  name="title" class="form-control" placeholder="Post Title">
                                    </div>
                                    <div class="form-group">
                                        <textarea   id="compose-textarea" class="form-control" style="height: 300px">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select"  name="category">
                                        <option selected>Select category</option>  
                                        
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>    
                                        @endforeach --}}
                                        </select> 
                                    </div>
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
                            
                            <button type="submit" form="createPostForm" class="btn btn-primary"><i class="far fa-envelope"></i> Submit</button>
                            </div>
                            <button type="reset"  form="createPostForm" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
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
          <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
      </footer>
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    
     
@endsection