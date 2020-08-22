
   <div id="wrapper">
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>                   
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                @if (session('userType') == '1')
                                    <img src="{{asset('backend/images/avatar/student.png')}}" alt="user-image" class="rounded-circle">
                                @elseif (session('userType') == '2')
                                    <img src="{{asset('backend/images/avatar/teacher.png')}}" alt="user-image" class="rounded-circle">
                                @elseif (session('userType') == '3')
                                    <img src="{{asset('backend/images/avatar/admin.jpg')}}" alt="user-image" class="rounded-circle">
                                @elseif (session('userType') == '4')
                                    <img src="{{asset('backend/images/avatar/director.jpg')}}" alt="user-image" class="rounded-circle">
                                @endif
                            

                            <span class="pro-user-name ml-1">
                                @if (session('userType') == '1')
                                    {{ __('lang.student')}}
                                @elseif (session('userType') == '2')
                                    {{ __('lang.teacher')}}
                                @elseif (session('userType') == '3')
                                    {{ __('lang.administrator')}}
                                @elseif (session('userType') == '4')
                                    {{ __('lang.director')}}
                                @endif
                                
                                <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                       
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{ __('lang.welcome')}} !</h6>
                            </div>

                            <div class="dropdown-divider"></div>
                            
                            <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>{{ __('lang.logout')}}</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <div class="logo-box">
                    <a href="{{route('director.dashboard')}}" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="{{asset('backend/images/logo-light.png')}}" alt="" height="50">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('backend/images/logo-light.png')}}" alt="" height="50">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>   
                 
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="left-side-menu">
            <div class="h-100" data-simplebar>
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title">{{ __('lang.naviagation')}}</li>

                        @if (session('userType')=='4')
                            <li>
                                <a href="#admin" data-toggle="collapse">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span>{{ __('lang.administrator')}}</span> 
                                </a>
                                <div class="collapse" id="admin">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('admin.list')}}">{{ __('lang.administrators')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.create')}}"> {{ __('lang.create_admin')}} </a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if ((session('userType')=='4') || (session('userType')=='3'))
                            <li>
                                <a href="#teachers" data-toggle="collapse" >
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span> {{ __('lang.teacher')}}</span> 
                                </a>
                                <div class="collapse" id="teachers">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('teacher.list')}}"> {{ __('lang.teacher_list')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('teacher.create')}}"> {{ __('lang.create_teacher')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                       
                            <li>
                                <a href="#students" data-toggle="collapse">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span> {{ __('lang.student')}} </span> 
                                </a>
                                <div class="collapse" id="students">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('student.list')}}"> {{ __('lang.student_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('student.create')}}"> {{ __('lang.create_student')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                       

                            <li>
                                <a href="#grades" data-toggle="collapse">
                                    <i class="mdi mdi-briefcase-check-outline"></i>
                                    <span> {{ __('lang.grades')}} </span> 
                                </a>
                                <div class="collapse" id="grades">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('grade.list')}}"> {{ __('lang.grade_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('grade.create')}}"> {{ __('lang.create_grade')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        
                            <li>
                                <a href="#classes" data-toggle="collapse">
                                    <i class="mdi mdi-briefcase-check-outline"></i>
                                    <span> {{ __('lang.class')}} </span> 
                                </a>
                                <div class="collapse" id="classes">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('classes.list')}}"> {{ __('lang.class_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('classes.create')}}"> {{ __('lang.create_class')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#courses" data-toggle="collapse">
                                    <i class="mdi mdi-briefcase-check-outline"></i>
                                    <span> {{ __('lang.course')}} </span> 
                                </a>
                                <div class="collapse" id="courses">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('course.list')}}"> {{ __('lang.course_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('course.create')}}"> {{ __('lang.create_course')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#student_class" data-toggle="collapse">
                                    <i class="mdi mdi-gift-outline"></i>
                                    <span>{{ __('lang.add_student_class')}}</span> 
                                </a>
                                <div class="collapse" id="student_class">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('student.student_class_list')}}"> {{ __('lang.student_class_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('student.student_class_add')}}"> {{ __('lang.add_student_class')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#student_course" data-toggle="collapse">
                                    <i class="mdi mdi-gift-outline"></i>
                                    <span> {{ __('lang.add_student_course')}} </span> 
                                </a>
                                <div class="collapse" id="student_course">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('student.student_course_list')}}"> {{ __('lang.student_course_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('student.student_course_add')}}"> {{ __('lang.add_student_course')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#teacher_class" data-toggle="collapse">
                                    <i class="mdi mdi-gift-outline"></i>
                                    <span> {{ __('lang.add_teacher_class')}} </span> 
                                </a>
                                <div class="collapse" id="teacher_class">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('teacher.teacher_class_list')}}"> {{ __('lang.teacher_class_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('teacher.teacher_class_add')}}"> {{ __('lang.add_teacher_class')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                       
                            <li>
                                <a href="#assign_class" data-toggle="collapse">
                                    <i class="mdi mdi-clipboard-multiple-outline"></i>
                                    <span> {{ __('lang.video_assign_class')}} </span> 
                                </a>
                                <div class="collapse" id="assign_class">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('assignment.list')}}"> {{ __('lang.video_assign_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('assignment.create')}}"> {{ __('lang.add_video_assign_class')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (session('userType')=='4')

                            <li>
                                <a href="#admin_access" data-toggle="collapse">
                                    <i class="mdi mdi-login"></i>
                                    <span> {{ __('lang.admin_access')}} </span> 
                                </a>
                                <div class="collapse" id="admin_access">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('adminAccess.list')}}"> {{ __('lang.accessed_admin')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('adminAccess.create')}}"> {{ __('lang.add_admin_permission')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#student_access" data-toggle="collapse">
                                    <i class="mdi mdi-login"></i>
                                    <span> {{ __('lang.student_access')}} </span> 
                                </a>
                                <div class="collapse" id="student_access">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('studentAccess.list')}}"> {{ __('lang.accessed_student')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('studentAccess.create')}}"> {{ __('lang.add_student_permission')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li>
                                <a href="#teacher_access" data-toggle="collapse">
                                    <i class="mdi mdi-login"></i>
                                    <span> {{ __('lang.teacher_access')}} </span> 
                                </a>
                                <div class="collapse" id="teacher_access">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('teacherAccess.list')}}"> {{ __('lang.accessed_teacher')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('teacherAccess.create')}}"> {{ __('lang.add_teacher_permission')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#payment_approve" data-toggle="collapse">
                                    <i class="mdi mdi-finance"></i>
                                    <span> {{ __('lang.approve_payment_notice')}} </span> 
                                </a>
                                <div class="collapse" id="payment_approve">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('approveStudent.list')}}"> {{ __('lang.student_payment_status')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('approveStudent.update')}}"> {{ __('lang.approve_notice_payment')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        @endif

                        @if (session('userType')=='3')
                            <li>
                                <a href="#payment_pending" data-toggle="collapse">
                                    <i class="mdi mdi-finance"></i>
                                    <span> {{ __('lang.student_payment')}} </span> 
                                </a>

                                <div class="collapse" id="payment_pending">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('pendingStudent.list')}}"> {{ __('lang.student_payment_status')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('pendingStudent.update')}}"> {{ __('lang.make_notice_payment')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        @endif

                        @if (session('userType')=='2')
                            <li>
                                <a href="{{route('attend.create')}}">
                                    <i class="mdi mdi-bookmark-check"></i>
                                    <span> {{ __('lang.take_attend')}} </span> 
                                </a>
                            </li>

                            <li>
                                <a href="#teacher_assign" data-toggle="collapse">
                                    <i class="mdi mdi-bookmark-check"></i>
                                    <span> {{ __('lang.video_assign_class')}} </span> 
                                </a>

                                <div class="collapse" id="teacher_assign">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('teacher_assign.list')}}"> {{ __('lang.video_assign_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('teacher_assign.create')}}"> {{ __('lang.add_video_assign_class')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#class_teacher" data-toggle="collapse">
                                    <i class="mdi mdi-bookmark-check"></i>
                                    <span> {{ __('lang.view_class_student')}} </span> 
                                </a>

                                <div class="collapse" id="class_teacher">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('class.list')}}"> {{ __('lang.class_list')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('substudent.list')}}"> {{ __('lang.student_list')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="{{route('score.create')}}">
                                    <i class="mdi mdi-bookmark-check"></i>
                                    <span> {{ __('lang.add_grade_student')}} </span> 
                                </a>                               
                            </li>

                        @endif

                        @if (session('userType')=='1')
                            <li>
                                <a href="{{route('student.assign')}}">
                                    <i class="mdi mdi-bookmark-check"></i>
                                    <span> {{ __('lang.video_assign')}}  </span> 
                                </a>                               
                            </li>

                            <li>
                                <a href="{{route('student.grades')}}">
                                    <i class="mdi mdi-bookmark-check"></i>
                                    <span> {{ __('lang.assign_grade')}}  </span> 
                                </a>                               
                            </li>

                            <li>
                                <a href="{{route('student.attend')}}">
                                    <i class="mdi mdi-bookmark-check"></i>
                                    <span> {{ __('lang.attend_grade')}}  </span> 
                                </a>                               
                            </li>

                            <li>
                                <a href="{{route('student.payment')}}">
                                    <i class="mdi mdi-bookmark-check"></i>
                                    <span> {{ __('lang.payment_status')}}  </span> 
                                </a>                               
                            </li>

                        @endif

                    </ul>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        