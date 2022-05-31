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
                   __confirmAction('Are You Sure ?', 'Porfolio will be deleted').then(function(reason){
                    //  user really wants to delete the post
      
                        var slug = $(this).data('slug');
                      // $(this).data('slug'); for jQuery or  this.dataset.slug (is for javascript)
      
      
                        axios.delete(`/admin/porfolios/${slug}`).then(function(response){
                          //all clear
      
                          window.location.reload();
      
                        }).catch(function(error){
                          // error occured
                          console.log(Error); 
      
                        });
                  
      
                    }.bind(this)).catch(function(reason){});
                   
                });
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
                            <h1>Porfolios</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Porfolios</li>
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
                                    <th style="width: 200px">Project Name</th>
                                    <th style="width: 50px">End Date</th>
                                    <th style="width: 50px">Start Date</th>
                                    {{-- <th style="width: 100px">Skills Used</th> --}}
                                    <th style="width: 50px">Status</th>
                                    <th style="width: 100px">Action</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($porfolios as $idx => $porfolio)
                                        
                                        <tr>
                                            <td>{{$idx + 1}}</td>
                                            <td>{{$porfolio->job_title}}</td>
                                            <td>
                                                {{$porfolio->project_name}}

                                                {{-- <div class="small text-muted"> Skills used  {{$porfolio->skill->lang_name}}</div> --}}
                                            
                                            </td>
                                            <td>{{$porfolio->start_date}}</td>
                                            <td>{{$porfolio->end_date}}</</td>
                                            
                                            <td>
                                                @if ($porfolio->published_at)
                                                         <span class="badge badge-success">published</span>   
                                                 @else 
                                                        <span class="badge badge-dark">unpublished</span>
                                                @endif 
                                            </td>
                                            <td>
                                                <a title ="Preview" href="{{route('admin.porfolios.preview', ['slug'=> $porfolio->slug])}}" class="btn  btn-sm btn-primary previewModalBtn"><i class ="fas fa-eye"></i></a>
                                                <a title ="Edit" href="{{route('admin.porfolios.edit', ['slug'=> $porfolio->slug])}}" class="btn btn-sm btn-warning"><i class ="fas fa-edit"></i></a>
                                                <button  data-slug="{{$porfolio->slug}}" title ="Delete" type="button" class="delBtn btn btn-sm btn-danger"><i class ="fas fa-trash"></i></button>
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

    