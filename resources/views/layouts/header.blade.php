<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    {{-- <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
    </ul> --}}
  </nav>
  {{-- sidebar-dark-primary --}}
  <aside class="main-sidebar  elevation-4 sidebar-light" style="background-color: #6610f2;">
    <a href="javascript" class="brand-link" style="text-align:center;">
      <span class="brand-text font-weight-light text-white" style="text-align: center;font-weight: bold !important;font-size: 20px;">School</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex text-white" >
        <div class="image">
          @if (Auth::user()->user_type == 2 || Auth::user()->user_type == 3)
            <img src="/upload/profile/{{Auth::user()->profile_pic}}" class="img-circle elevation-2 text-white" alt="User Image">
          @else  
            <img src="/upload/profile/user.jpeg" class="img-circle elevation-2 text-white" alt="User Image">
          @endif
          
        </div>
        <div class="info">
          <a href="#" class="d-block text-white">{{Auth::user()->name}}</a>
        </div>
      </div>
      
      <nav class="mt-2" style="color: white">
        <ul class="nav nav-pills nav-sidebar flex-column text-white text-white" data-widget="treeview" role="menu" data-accordion="false">
          
          @if (Auth::user()->user_type == 1)
            <li class="nav-item text-white" >
              <a href="{{url('admin/dashboard')}}" class="nav-link text-white @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                <p class="text-white">
                  Dashboard
                </p>
              </a>
            </li>
  
            <li class="nav-item">
              <a href="{{url('admin/admin/list')}}" class="nav-link text-white @if(Request::segment(2) == 'admin') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  Admin
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('admin/teacher/list')}}" class="nav-link text-white @if(Request::segment(2) == 'teacher') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  Teacher
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('admin/student/list')}}" class="nav-link text-white @if(Request::segment(2) == 'student') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  Student
                </p>
              </a>
            </li>

            <li class="nav-item  @if(Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'class_timetable' || Request::segment(2) == 'assign_class_teacher') menu-is-opening menu-open @endif">
              <a href="#" class="nav-link text-white @if(Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'class_timetable' || Request::segment(2) == 'assign_class_teacher') active @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Academics
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/class/list')}}" class="nav-link text-white @if(Request::segment(2) == 'class') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Class</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/subject/list')}}" class="nav-link text-white @if(Request::segment(2) == 'subject') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Subject</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/assign_subject/list')}}" class="nav-link text-white @if(Request::segment(2) == 'assign_subject') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Assign Subject</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/class_timetable/list')}}" class="nav-link text-white @if(Request::segment(2) == 'class_timetable') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Class TimeTable</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/assign_class_teacher/list')}}" class="nav-link text-white @if(Request::segment(2) == 'assign_class_teacher') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Assign Class Teacher</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item  @if(Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
              <a href="#" class="nav-link text-white" @if(Request::segment(2) == 'attendance') active @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Attendance
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/attendance/student')}}" class="nav-link text-white @if(Request::segment(2) == 'student') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Student Attendance</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/attendance/report')}}" class="nav-link text-white @if(Request::segment(2) == 'report') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Attendance Report</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="{{url('admin/account')}}" class="nav-link text-white @if(Request::segment(2) == 'account') active @endif">
                <i class="nav-icon fas fa-user text-white" ></i>
                <p class="text-white">
                  My Account
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('admin/change_password')}}" class="nav-link text-white @if(Request::segment(2) == 'change_password') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  Change Password
                </p>
              </a>
            </li>
          
          @elseif(Auth::user()->user_type == 2)
            <li class="nav-item">
              <a href="{{url('teacher/dashboard')}}" class="nav-link text-white @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                <p class="text-white">
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('teacher/my_student')}}" class="nav-link text-white @if(Request::segment(2) == 'my_student') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  My Student
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('teacher/my_class')}}" class="nav-link text-white @if(Request::segment(2) == 'my_class') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  My Class
                </p>
              </a>
            </li>
            <li class="nav-item  @if(Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
              <a href="#" class="nav-link text-white" @if(Request::segment(2) == 'attendance') active @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Attendance
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('teacher/attendance/student') }}" class="nav-link text-white @if(Request::segment(3) == 'student') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Student Attendance</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('teacher/attendance/report')}}" class="nav-link text-white @if(Request::segment(3) == 'report') active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Attendance Report</p>
                  </a>
                </li>
              </ul>
            </li> 
            </li>
            <li class="nav-item">
              <a href="{{url('teacher/account')}}" class="nav-link text-white @if(Request::segment(2) == 'account') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  My Account
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('teacher/change_password')}}" class="nav-link text-white @if(Request::segment(2) == 'change_password') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  Change Password
                </p>
              </a>
            </li>
          
          @elseif(Auth::user()->user_type == 3)
            <li class="nav-item">
              <a href="{{url('student/dashboard')}}" class="nav-link text-white @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt text-white" ></i>
                <p class="text-white">
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('student/my_subject')}}" class="nav-link text-white @if(Request::segment(2) == 'my_subject') active @endif">
                <i class="nav-icon fas fa-user text-white" ></i>
                <p class="text-white">
                  My Subject
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('student/my_timetable')}}" class="nav-link text-white @if(Request::segment(2) == 'my_timetable') active @endif">
                <i class="nav-icon fas fa-user text-white" ></i>
                <p class="text-white">
                  My Timetable
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('student/my_attendance')}}" class="nav-link text-white @if(Request::segment(2) == 'my_attendance') active @endif">
                <i class="nav-icon fas fa-user text-white" ></i>
                <p class="text-white">
                  My Attendance
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('student/account')}}" class="nav-link text-white @if(Request::segment(2) == 'myAccount') active @endif">
                <i class="nav-icon fas fa-user text-white" ></i>
                <p class="text-white">
                  My Account
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('student/change_password')}}" class="nav-link text-white @if(Request::segment(2) == 'change_password') active @endif">
                <i class="nav-icon fas fa-user text-white"></i>
                <p class="text-white">
                  Change Password
                </p>
              </a>
            </li>
          
          @endif

          <li class="nav-item">
            <a href="{{url('logout')}}" class="nav-link text-white">
              <i class="nav-icon fas fa-user text-white"></i>
              <p class="text-white">
                Logout
              </p>
            </a>
          </li>
      
        </ul>
      </nav>
    </div>
  </aside>