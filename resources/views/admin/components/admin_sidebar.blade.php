 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{route('admin.posts.index')}}" class="brand-link">
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
                <a href="#" class="d-block">{{Auth::user()->firstname }}  {{Auth::user()->lastname }}</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Post
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
                                <p>Archives</p>
                            </a>
                        </li>
        
                            <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
        
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}
                                        <i class="far fa-circle nav-icon"></i>
                                        <p></p>
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}
                                        <i class="far fa-circle nav-icon"></i>
                                        <p></p>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Logout') }}</p>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </li>
                    

                    <li class="nav-item">
                        <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                        </a>
                    </li>
                    
                
                </ul>
               
           
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>