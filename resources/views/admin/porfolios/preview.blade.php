@extends('layout.admin')

    @section('page-title', 'Preview')

@section('scripts')
@endsection
@section('content')
    
    
    
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Preview Your Porfolio</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.porfolios.index')}}">Home</a></li>
                  <li class="breadcrumb-item active"><a href="{{route('admin.porfolios.create')}}">Preview Porfolio</a> </li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{$porfolio->job_title}}</h3>
                            </div>
                            <!-- /.card-header --> 
                        <div class="card-body">
                            <img class="w-100 h-auto" src="/storage/{{$porfolio->featured_img}}" alt="" srcset="">
                            <div class="mt-5">
                                {!!$porfolio->content!!}
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-->
                <div class="col-4">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Technologies Used </h3>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <div class="list-group">
                                   
                                        
                                        <a href="#" class="list-group-item list-group-item">
                                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                            <div class="d-flex w-100 justify-content-between">
                                                @foreach ($skills as $skill)
                                                    <p class="text-muted">
                                                        <span class="tag tag-danger">{{$skill->lang_name}}</span>
                                                    </p>
                                                @endforeach
                                            </div>
                                            
                                            
                                        </a>
     
                                </div>
                            </div>
                        
                    <!-- /.card-body -->
                      </div>
                </div>
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