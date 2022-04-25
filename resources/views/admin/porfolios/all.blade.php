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
      
                // $('.delBtn').click(function(e){
                //    __confirmAction('Are You Sure ?', 'Post will be deleted').then(function(reason){
                //     //  user really wants to delete the post
      
                //         var slug = $(this).data('slug');
                //       // $(this).data('slug'); for jQuery or  this.dataset.slug (is for javascript)
      
      
                //         axios.delete(`/admin/posts/${slug}`).then(function(response){
                //           //all clear
      
                //           window.location.reload();
      
                //         }).catach(function(error){
                //           // error occured
                //           console.log(Error); 
      
                //         });
                  
      
                //   }.bind(this)).catch(function(reason){});
                   
                // });
            })
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

                <!-- Main content -->
                <section class="content">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between no-pseudo-content">
                                <h3 class="card-title">Manage Porfolio</h3>
                                <a href="{{route('admin.porfolios.create')}}"  style="margin-left: 1000px" class="btn btn-sm btn-primary">Create</a>
                            </div>
                                <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 20px">S/N</th>
                                    <th style="width: 100px">Job Title</th>
                                    <th style="width: 100px">Project Name</th>
                                    <th>Description</th>
                                    <th style="width: 100px">Date Range</th>
                                    <th style="width: 100px">Skills Used</th>
                                    <th style="width: 50px">Status</th>
                                    <th style="width: 100px">Action</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a title ="Preview" href="#" class="btn  btn-sm btn-primary"><i class ="fas fa-eye"></i></a>
                                        <a title ="Edit" href="#" class="btn btn-sm btn-warning"><i class ="fas fa-edit"></i></a>
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

    