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
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">

                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Post</th>
                                <th>Status</th>
                                <th>Action</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            
                            </tr>
                            
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        
    @endsection

    