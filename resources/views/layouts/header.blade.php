  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
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
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('../dist/img/images/logo.png')}}" alt="School Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Iqra Model Madrasah</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('../asset/userIcon.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->user_type==1)
          <li class="nav-item">
            <a href="{{ url('superadmin/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('superadmin/admin/list') }}" class="nav-link @if(Request::segment(2)=='admin') active @endif">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Admins
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('superadmin/contactus') }}" class="nav-link @if(Request::segment(2)=='contactus') active @endif">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Contact Messages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('superadmin/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type==2)
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->role==0)
          <li class="nav-item">
            <a href="{{ url('admin/teacher/list') }}" class="nav-link @if(Request::segment(2)=='teacher') active @endif">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Teachers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/student/list') }}" class="nav-link @if(Request::segment(2)=='student') active @endif">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Students
              </p>
            </a>
          </li>
          <li class="nav-item @if(Request::segment(2)=='class' || Request::segment(2)=='subject' || Request::segment(2)=='assign_subject' || Request::segment(2)=='assign_class_teacher') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='class' || Request::segment(2)=='subject' || Request::segment(2)=='assign_subject' || Request::segment(2)=='assign_class_teacher'||Request::segment(2)=='class_timetable') active @endif">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Academics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/class/list') }}" class="nav-link @if(Request::segment(2)=='class') active @endif">
                  <i class="fas fa-chalkboard nav-icon"></i>
                  <p>Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/subject/list') }}" class="nav-link @if(Request::segment(2)=='subject') active @endif">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/class_timetable/list') }}" class="nav-link @if(Request::segment(2)=='class_timetable') active @endif">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Class Timetable</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/assign_subject/list') }}" class="nav-link @if(Request::segment(2)=='assign_subject') active @endif">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Assign Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/assign_class_teacher/list') }}" class="nav-link @if(Request::segment(2)=='assign_class_teacher') active @endif">
                  <i class="fas fa-school nav-icon"></i>
                  <p>Assign Class to Teacher</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(Auth::user()->role==1)
          <li class="nav-item @if(Request::segment(2)=='fees_collection') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='fees_collection') active @endif">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Fees Collection
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/class/list') }}" class="nav-link @if(Request::segment(2)=='class') active @endif">
                  <i class="fas fa-chalkboard nav-icon"></i>
                  <p>Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/fees_collection/collect_fees') }}" class="nav-link @if(Request::segment(3)=='collect_fees') active @endif">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Collect Fees</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(Auth::user()->role==0)
          <li class="nav-item @if(Request::segment(2)=='examinations') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='examinations') active @endif">
              <i class="nav-icon far fa-clipboard"></i>
              <p>
                Examination
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/examinations/exam/list') }}" class="nav-link @if(Request::segment(3)=='exam') active @endif">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Exam List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/examinations/exam_schedule') }}" class="nav-link @if(Request::segment(3)=='exam_schedule') active @endif">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Exam Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/examinations/marks_register') }}" class="nav-link @if(Request::segment(3)=='marks_register') active @endif">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Marks Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/examinations/student_marks') }}" class="nav-link @if(Request::segment(3)=='student_marks') active @endif">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Student Marks</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item">
            <a href="{{ url('admin/gallary/list') }}" class="nav-link @if(Request::segment(2)=='galary') active @endif">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Gallery Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/notice/list') }}" class="nav-link @if(Request::segment(2)=='notice') active @endif">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Notice Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/contactus') }}" class="nav-link @if(Request::segment(2)=='contactus') active @endif">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Contact Messages
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/account') }}" class="nav-link @if(Request::segment(2)=='account') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type==3)
          <li class="nav-item">
            <a href="{{ url('teacher/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('teacher/my_class_subject') }}" class="nav-link @if(Request::segment(2)=='my_class_subject') active @endif">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                My Classes & Subjects
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('teacher/my_student') }}" class="nav-link @if(Request::segment(2)=='my_student') active @endif">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                My Students
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('teacher/my_exam_schedule') }}" class="nav-link @if(Request::segment(2)=='my_exam_schedule') active @endif">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                My Exam Schedule
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('teacher/marks_register') }}" class="nav-link @if(Request::segment(2)=='marks_register') active @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Marks Register
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('teacher/account') }}" class="nav-link @if(Request::segment(2)=='account') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('teacher/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type==4)
          <li class="nav-item">
            <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('student/my_subject') }}" class="nav-link @if(Request::segment(2)=='my_subject') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                My Subject
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('student/my_timetable') }}" class="nav-link @if(Request::segment(2)=='my_timetable') active @endif">
              <i class="nav-icon far fa-clock"></i>
              <p>
                Class Timetable
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('student/my_exam_schedule') }}" class="nav-link @if(Request::segment(2)=='my_exam_schedule') active @endif">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                My Exam Schedule
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('student/my_exam_result') }}" class="nav-link @if(Request::segment(2)=='my_exam_result') active @endif">
              {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                My Exam Result
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('student/my_fees') }}" class="nav-link @if(Request::segment(2)=='my_fees') active @endif">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                My Fees
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('student/account') }}" class="nav-link @if(Request::segment(2)=='account') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('student/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @endif
          
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>