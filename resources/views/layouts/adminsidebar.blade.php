<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admindash')}}" class="brand-link">
      <img src="{{asset('home_imgs/'.$homes->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span style='font-size:15px' class="brand-text font-weight-light">{{$homes->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="" class="d-block">{{$user->name}}</a>
        </div>
      </div>
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
          </div>
          <div class="info">
            <a href="{{route('logout')}}" class="d-block">Logout</a>
          </div>
        </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul  class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Add Role
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item ">
            <a href="{{route('admindash')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>

          </li>
          <li class="nav-item ">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Update
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>Home
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('updateHome')}}" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Images
                         
                        </p>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('addHome')}}" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Title & Description
                        
                      </p>
                      
                    </a>
                  </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="{{route('updateAbout')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About</p>
                  </a>
                </li>
               
                <li class="nav-item">
                  <a href="{{route('addContacts')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contacts</p>
                  </a>
                </li>
                
                
              </ul>
            </li>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lists
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{route('employeeList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('productList')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('newsList')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>News List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('serviceList')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Service List</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('deptList')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Department List</p>
        </a>
      </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Create
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addServices')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addProducts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{route('addEmployees')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Employees</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{route('addNews')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>News</p>
            </a>
        </li>

        <li class="nav-item">
          <a href="{{route('addDepartments')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Departments</p>
          </a>
      </li>
      <li class="nav-item">
        <a href="{{route('addCategories')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Category</p>
        </a>
    </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

