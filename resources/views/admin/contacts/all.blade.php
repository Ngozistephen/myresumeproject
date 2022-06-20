@extends('layout.admin')
    @section('page-title', 'All')

    @section('styles')
         <!-- DataTables -->
         <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
         <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        
         <style>
          .user-info{
              font-size: 1rem;
              font-style: italic;
          };
          
        </style>
    @endsection
    @section('scripts')
            <!-- DataTables -->
        <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="/js/custom/fix-custom-file-select.js"></script>
        <!-- Summernote -->
        <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

        <script>
            $(function(){
                  $("#example1").DataTable({
                  "responsive": true,
                  "autoWidth": false,
                });
      
                $('.delBtn').click(function(e){
                   __confirmAction('Are You Sure ?', 'Contacts will be deleted').then(function(reason){
                    //  user really wants to delete the post
      
                        var slug = $(this).data('slug');
                      // $(this).data('slug'); for jQuery or  this.dataset.slug (is for javascript)
      
      
                        axios.delete(`/admin/contacts/${slug}`).then(function(response){
                          //all clear
      
                          window.location.reload();
      
                        }).catach(function(error){
                          // error occured
                          console.log(Error); 
      
                        });
                  
      
                  }.bind(this)).catch(function(reason){});
                   
                });
            })
        </script>

        <script>
          // For the Create Tag. it is done with javascript
          $('#createContactForm').submit(function(e){ 
            // console.log("error");
              e.preventDefault();
              $('#formErrs').remove();
              var formData = new FormData(this);

              var about = $('#compose-textarea').summernote('code');

              formData.append('about', about);
            
              axios.post(this.action, formData).then(function(response){
                // request successful, the post was saved.
                window.location.reload(true);
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
                      $('#createContactForm').prepend(ul);
                  }
                }else{
                  var ul = $('<ul></ul>').addClass('list-unstyled alert alert-danger').attr({id: 'formErrs'});
                  var li = $('<li></li>').text('An unexpected error has occured please try again later');
                  ul.append(li);
                  $('#createContactForm').prepend(ul);
                } 
              });
          });
          fixCustomFileSelectLabel('featuredImgInput');
        </script>

<script>
  // Create Section
  (function($){
    
    $('.createModalBtn').on('click', function(event){

      $('#exampleModalCreate').modal('show');

      let user = $(this).data('user');

      $('#compose-textarea').val(user.about);

      $('#featuredImgInput').val(user.profile_img);

      $('#address').val(user.address);

      $('#phone_number').val(user.phone_number);

      $('#social_medialinks').val(user.social_medialinks);

      let form = $('#createContactForm')

      form.attr('action', user.id + '/contacts');

    });
    
  })(jQuery);  

</script>
<script>
  // Edit Section
  (function($){
    
    $('.editModalBtn').on('click', function(event){

      $('#exampleModalEdit').modal('show');

      let user = $(this).data('user');

      $('#compose-textareaedit').summernote('code', user.about); 

    
      
      $('#featuredImgInputedit').val(user.profile_img);
      
      $('#addressedit').val(user.address);
      
      $('#phone_numberedit').val(user.phone_number);

      console.log(user.phone_number);
     

      $('#social_medialinksedit').val(user.social_medialinks);

      let form = $('#editContactForm')

      // form[0].action = user.id + '/contacts'.slug;
      form.attr('action', user.id + '/contacts'.slug);
     

    });
    
  })(jQuery);
</script>

<script>

  // for prefilling that shows a content preview
      (function($){
        
        $('.previewModalBtn').on('click', function(event){
    
          $('#exampleModalPreview').modal('show');
    
          let user = $(this).data('user');
  
          $('#featuredImgInputpreview').text(user.profile_img);

          $('#compose-textareapreview').html(user.about);
  
          $('#addresspreview').text(user.address);
  
          $('#phone_numberpreview').text(user.phone_number);
          
          $('#emailpreview').email(user.email); 

          $('#social_medialinkspreview').text(user.social_medialinks);
  
    
        });
        
      })(jQuery);
    
  </script>

<script>
  $(function () {
    //Add text editor
      $('#compose-textarea').summernote({
        placeholder: 'tell us about yourself?',
        focus:true,
        minHeight:100
      });
    
    $('#compose-textarea').summernote('code','');

  })

  $('#phone_number').mask();
</script>
<script>
  // For Edit the Summernote id should be unique 

  $(function () {
    //Add text editor
      $('#compose-textareaedit').summernote({
        placeholder: 'tell us about yourself?',
        focus:true,
        minHeight:100
      });
      // $('#compose-textareaEdit').summernote('code','');     

  })

  $('#phone_numberedit').mask();
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
                            <h1>Admin Info.</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                            </ol>
                        </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>


                <section class="content-header">

                       
                  @include('admin.contacts.create')
                  @include('admin.contacts.edit')
                  @include('admin.contacts.preview')
                      
                </section>

                <!-- Main content -->
                <section class="content">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between no-pseudo-content">
                                <h3 class="card-title">Admin Details</h3>
                                {{-- <a href="" class="btn btn-sm btn-primary" style="margin-left: 1000px">Create</a> --}}
                            </div>
                                <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 50px">S/N</th>
                                    <th style="width: 100px">Firstname</th>
                                    <th style="width: 100px">Lastname</th>
                                    <th style="width: 100px">Email Address</th>
                                    <th>About</th>
                                    <th style="width: 200px">Action</th>

                                    
                                  </tr>
                                </thead>
                                <tbody>

                                 @foreach ($users as $idx => $user)
                                    <tr>
                                        <td>{{$idx + 1}}</td>
                                        <td>{{$user->firstname}}</td>
                                        <td>{{$user->lastname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{!!$user->about!!}</td>
                                        <td>
                                            <button data-user= "{{$user}}" title ="Preview" type="button" href="#" class="btn  btn-sm btn-primary previewModalBtn"  data-toggle="modal" data-target="#exampleModalPreview"><i class ="fas fa-eye"></i></button>
                                            <button data-user="{{$user}}" title ="Create" type="button" href="" class="btn btn-sm btn-warning createModalBtn" data-toggle="modal" data-target="#exampleModalCreate"><i class ="fas fa-edit"></i></button>
                                            <button  data-user="{{$user}}" title ="Edit" type="button" class="btn btn-sm btn-danger editModalBtn"  data-toggle="modal" data-target="#exampleModalEdit" ><i class ="fas fa-glasses"></i></button>
                                            <button  data-slug="{{$user->slug}}" title ="Delete" type="button" class="delBtn btn btn-sm btn-danger"><i class ="fas fa-trash"></i></button>
                                        </td>
                                        
                                    </tr>
                                 @endforeach   
                                
                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->
                            
                        
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        
    @endsection

    