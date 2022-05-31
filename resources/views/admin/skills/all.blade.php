@extends('layout.admin')
    @section('page-title', 'All')

    @section('styles')
         <!-- DataTables -->
         <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
         <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        
    @endsection
    @section('scripts')
            <!-- DataTables -->
        <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <script>
            $(function(){
                  $("#example1").DataTable({
                  "responsive": true,
                  "autoWidth": false,
                });
      
                $('.delBtn').click(function(e){
                   __confirmAction('Are You Sure ?', 'Skill will be deleted').then(function(reason){
                    //  user really wants to delete the post
      
                        var slug = $(this).data('slug');
                      // $(this).data('slug'); for jQuery or  this.dataset.slug (is for javascript)
      
      
                        axios.delete(`/admin/skills/${slug}`).then(function(response){
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
          $('#createSkillForm').submit(function(e){ 
              e.preventDefault();
              $('#formErrs').remove();
              var formData = new FormData(this);
    
              
    
              axios.post("{{route('admin.skills.store')}}", formData).then(function(response){
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
                      $('#createSkillForm').prepend(ul);
                  }
                }else{
                  var ul = $('<ul></ul>').addClass('list-unstyled alert alert-danger').attr({id: 'formErrs'});
                  var li = $('<li></li>').text('An unexpected error has occured please try again later');
                  ul.append(li);
                  $('#createSkillForm').prepend(ul);
                } 
              });
          });
          fixCustomFileSelectLabel('featuredImgInput');
        </script>

<script>

  (function($){
    
    $('.editModalBtn').on('click', function(event){

      $('#exampleModalEdit').modal('show');

      let skill = $(this).data('skill');

      $('#editSkillControl').val(skill.lang_name);

      $('#featuredImgInput').val(skill.lang_image);

      let form = $('#editSkillForm')

      form[0].action = '/admin/skills/'+skill.slug;

    });
    
  })(jQuery);

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
                            <h1>Skills</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Skills</li>
                            </ol>
                        </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>


                <section class="content-header">

                    {{-- <form class="form-group" action="/update/{{$editCommunity->id}}" method="post" id="editCommunityForm_{{$editCommunity->id}}"> --}}
                      <!-- Modal For Edit Skill-->
                    @include('admin.skills.edit')
  
                    @include('admin.skills.create')
                </section>

                <!-- Main content -->
                <section class="content">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between no-pseudo-content">
                                <h3 class="card-title">Manage Skills</h3>
                                <a href="" class="btn btn-sm btn-primary" style="margin-left: 1000px" data-toggle="modal" data-target="#exampleModal">Create</a>
                            </div>
                                <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 50px">S/N</th>
                                    <th>Language/Framework Name</th>
                                    <th style="width: 100px">Action</th>

                                    
                                  </tr>
                                </thead>
                                <tbody>

                                 @foreach ($skills as $idx => $skill)
                                    <tr>
                                        <td>{{$idx + 1}}</td>
                                        <td>
                                          <a href="">{{$skill->lang_name}}</a>
                                        </td>
                                        <td>
                                            <button data-skill="{{$skill}}" title ="Edit" href="" class="btn btn-sm btn-warning editModalBtn"><i class ="fas fa-edit"></i></button>
                                            <button  data-slug="{{$skill->slug}}" title ="Delete" type="button" class="delBtn btn btn-sm btn-danger"><i class ="fas fa-trash"></i></button>


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

    