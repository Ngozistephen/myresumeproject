@extends('layout.admin')
    @section('page-title', 'All')

    @section('styles')
         <!-- DataTables -->
         <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
         <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

         <style>
             .training-info{
                 font-size: 1rem;
                 font-style: italic;
             }
         </style>
        
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
                   __confirmAction('Are You Sure ?', 'Training will be deleted').then(function(reason){
                    //  user really wants to delete the post
      
                        var slug = $(this).data('slug');
                      // $(this).data('slug'); for jQuery or  this.dataset.slug (is for javascript)
      
      
                        axios.delete(`/admin/trainings/${slug}`).then(function(response){
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


<script>

// for prefilling that shows a content
    (function($){
      
      $('.previewModalBtn').on('click', function(event){
  
        $('#exampleModal').modal('show');
  
        let training = $(this).data('training');

        $('#company_namepreview').text(training.company_name);

        $('#certification_acquiredpreview').text(training.certification_acquired);

        $('#start_datepreview').text(training.start_date);

        $('#end_datepreview').text(training.end_date);

        $('#contentpreview').html(training.content);  
  
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
                            <h1>Trainings</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Trainings</li>
                            </ol>
                        </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>


                <section class="content-header">


                    @include('admin.trainings.preview')

                </section>

                <!-- Main content -->
                <section class="content">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between no-pseudo-content">
                                <h3 class="card-title">Manage Trainings</h3>
                                <a href="{{route('admin.trainings.create')}}"  style="margin-left: 1000px" class="btn btn-sm btn-primary">Create</a>
                            </div>
                                <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 20px">S/N</th>
                                    <th style="width: 200px">Name of Company</th>
                                    {{-- <th style="width: 100px">Certification Gained</th> --}}
                                    <th style="width: 300px">Decription of Knowledge Gained</th>
                                    <th style="width: 100px">End Date</th>
                                    <th style="width: 100px">Start Date</th>
                                    {{-- <th style="width: 100px">Skills Used</th> --}}
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 150px">Action</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($trainings as $idx => $training)
                                           
                                        <tr>
                                            <td>{{$idx + 1}}</td>
                                            <td>{{$training->company_name}}</td>
                                            <td>{!!$training->content!!}</td>
                                            <td>{{$training->start_date}}</td>
                                            <td>{{$training->end_date}}</td>
                                            
                                            <td>
                                                @if ($training->published_at)
                                                            <span class="badge badge-success">published</span>   
                                                    @else 
                                                        <span class="badge badge-dark">unpublished</span>
                                                @endif 
                                            </td>
                                            <td>
                                                {{-- <a title ="Preview" href="{{route('admin.trainings.preview', ['slug'=> $training->slug])}}" class="btn  btn-sm btn-primary"><i class ="fas fa-eye"></i></a> --}}
                                                <button data-training= "{{$training}}" title ="Preview" href="#" class="btn  btn-sm btn-primary previewModalBtn"  data-toggle="modal" data-target="#exampleModal"><i class ="fas fa-eye"></i></button>
                                                <a title ="Edit" href="{{route('admin.trainings.edit', ['slug'=> $training->slug])}}" class="btn btn-sm btn-warning"><i class ="fas fa-edit"></i></a>
                                                
                                                <button  data-slug="{{$training->slug}}" title ="Delete" type="button" class="delBtn btn btn-sm btn-danger"><i class ="fas fa-trash"></i></button>

                                                
    
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

    