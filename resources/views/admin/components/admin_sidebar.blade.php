 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{route('admin.porfolios.index')}}" class="brand-link">
         <span class="brand-text font-weight-bold">{{config('app.name')}}</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                <a href="#" class="d-block font-weight-bold">{{Auth::user()->firstname }}  {{Auth::user()->lastname }}</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">

             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                         <i class=" nav-icon fa-solid fa-user"></i>
                        <p> Admin  <span class="right badge badge-danger">New</span></p>
                    </a>
                </li>
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                        <i class="nav-icon fa-solid fa-floppy-disk"></i>
                        <p>
                            Porfolio
                            
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.porfolios.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{route('admin.porfolios.index')}} class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All</p>
                            </a>
                        </li>
        
                      
                    </li>
                
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-tachometer-alt"></i>
                    
                    <p>
                       Trainings
                        <i class="right fas fa-angle-left"></i>
                        
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.porfolios.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{route('admin.porfolios.index')}} class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All</p>
                        </a>
                </li>
            </ul>
            {{-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                       Trainings
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.posts.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{route('admin.posts.index')}} class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All</p>
                        </a>
                </li>
            </ul> --}}


            <li class="nav-item">
                <a href="{{route('admin.skills.index')}}" class="nav-link">
                {{-- <i class="nav-icon fas fa-th"></i> --}}
                <i class=" nav-icon fa-solid fa-book-journal-whills"></i>
                <p>
                    Skills
                    <span class="right badge badge-danger">New</span>
                </p>
                </a>
            </li>


                    <!-- Authentication Links -->
                      @guest
                          @if (Route::has('login'))
      
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}
                                      <i class="fa-solid fa-power-off nav-icon"></i>
                                      <p></p>
                                  </a>
                              </li>
                          @endif

                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}
                                      <i class="fa-solid fa-power-off nav-icon"></i> 
                                      <p></p>
                                  </a>
                              </li>
                          @endif
                        @else
                          <li class="nav-item">

                              <a class="nav-link" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                  <i class="fa-solid fa-power-off nav-icon"></i>
                                  <p>{{ __('Logout') }}</p>
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </li>
                      @endguest


                    
               
           
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>