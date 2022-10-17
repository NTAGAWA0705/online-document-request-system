<!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark" style="background-color: rgb(39, 44, 74);">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <a href="{{ route('home') }}"><img class="logo-img" src="{{ asset('images/odrs logo.png') }}" alt="logo"></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('home') }}" style="background-color: rgb(27, 31, 61);"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard</a>
                            </li>

                            @can('request_document')
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('requests') }}"><i class="fa fa-fw fa-certificate"></i>Request document </a>
                            </li>
                            @endcan
                            @can('request_document')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('requests') }}"><i class="fa fa-fw fa-certificate"></i>My documents </a>
                                </li>
                            @endcan

                            @can('add_new_students')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('all_students') }}"><i class="fa fa-fw fa-user-graduate"></i>Student</a>
                                </li>                                    
                            @endcan
                            @can('view_users')    
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8">
                                        <i class="fas fa-fw fa-chart-pie"></i> Users
                                    </a>
                                    <div id="submenu-8" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('allUsers') }}">All users</a>
                                            </li>
                                            @can('create_courses')
                                                <li class="nav-item">
                                                    <a class="nav-link" href="status-report.html">New user</a>
                                                </li>                                                
                                            @endcan
                                        </ul>
                                    </div>
                                </li>                              
                            @endcan
                            @can('manage_courses')
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8">
                                    <i class="fas fa-fw fa-chart-pie"></i> Manage Courses
                                </a>
                                <div id="submenu-8" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('allUsers') }}">All courses</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">Create new course</a>
                                        </li>                                                
                                    </ul>
                                </div>
                            </li> 
                            @endcan
                            @can('manage_departments')
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8">
                                    <i class="fas fa-fw fa-chart-pie"></i> Manage Departments
                                </a>
                                <div id="submenu-8" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('allUsers') }}">All departments</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">Create new department</a>
                                        </li>                                                
                                    </ul>
                                </div>
                            </li> 
                            @endcan

                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('settings') }}"><i class="fa fa-fw fa-user-graduate"></i>My settings</a>
                            </li>
                            
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-chart-pie"></i>Reports</a>
                                <div id="submenu-8" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="income-report.html">Income</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="course-report.html">Request by Course</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="status-report.html">Request Status</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->