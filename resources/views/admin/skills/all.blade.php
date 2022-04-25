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

        {{-- <script>
            $(function(){
                  $("#example1").DataTable({
                  "responsive": true,
                  "autoWidth": false,
                });
      
                $('.delBtn').click(function(e){
                   __confirmAction('Are You Sure ?', 'Post will be deleted').then(function(reason){
                    //  user really wants to delete the post
      
                        var slug = $(this).data('slug');
                      // $(this).data('slug'); for jQuery or  this.dataset.slug (is for javascript)
      
      
                        axios.delete(`/admin/posts/${slug}`).then(function(response){
                          //all clear
      
                          window.location.reload();
      
                        }).catach(function(error){
                          // error occured
                          console.log(Error); 
      
                        });
                  
      
                  }.bind(this)).catch(function(reason){});
                   
                });
            })
        </script> --}}

        <script>
          // For the Create Tag. it is done with javascript
          $('#createSkillForm').submit(function(e){
              e.preventDefault();
              $('#formErrs').remove();
              var formData = new FormData(this);
    
              
    
              axios.post("{{route('admin.skills.store')}}", formData).then(function(response){
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

       
    @endsection

    @section('content')
        
                <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>


                <section class="content-header">

                    {{-- <form class="form-group" action="/update/{{$editCommunity->id}}" method="post" id="editCommunityForm_{{$editCommunity->id}}"> --}}
                      <!-- Modal For Edit Skill-->
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
                                  <input id="editSkillControl"  name="lang_name"  class="form-control" placeholder="Language/ Framework Name">

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
                  </section>

                <!-- Main content -->
                <section class="content">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between no-pseudo-content">
                                <h3 class="card-title">Manage Porfolio</h3>
                                <a href="" class="btn btn-sm btn-primary" style="margin-left: 1000px" data-toggle="modal" data-target="#exampleModal">Create</a>
                            </div>
                                <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 50px">S/N</th>
                                    <th>Language/Framework Name</th>
                                    <th style="width: 100px">Status</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button data-tag="#" title ="Edit" href="" class="btn btn-sm btn-warning editModalBtn"><i class ="fas fa-edit"></i></button>
                                        <button  data-slug="#" title ="Delete" type="button" class="delBtn btn btn-sm btn-danger"><i class ="fas fa-trash"></i></button>
                                    </td>
                                
                                </tr>
                                
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

    