@extends('layouts/backMain')
@extends('layouts/directorSide')

@section('content')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                      
                        <h4 class="page-title"> {{ __('lang.welcome')}} </h4>
                    </div>
                </div>
            </div> 
               

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                    <i class="fe-user font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1"><span data-plugin="counterup">{{$student_count}} </span></h3>
                                    <p class="text-muted mb-1 text-truncate"> {{ __('lang.total_students')}} </p>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div> 

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                    <i class="fe-user font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$teacher_count}}</span></h3>
                                    <p class="text-muted mb-1 text-truncate"> {{ __('lang.total_teachers')}} </p>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div> 

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                    <i class="fe-archive font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$classes_count}}</span></h3>
                                    <p class="text-muted mb-1 text-truncate"> {{ __('lang.total_classes')}} </p>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                    <i class="fe-cpu font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$course_count}}</span></h3>
                                    <p class="text-muted mb-1 text-truncate"> {{ __('lang.total_courses')}} </p>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div> 
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">                       
                        <h4 class="header-title mb-3"> {{ __('lang.home_student')}} </h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-nowrap table-centered m-0 text-center">

                                <thead class="thead-light">
                                    <tr>
                                        <th> {{ __('lang.profile_image')}} </th>
                                        <th> {{ __('lang.first_name')}} </th>
                                        <th> {{ __('lang.last_name')}} </th>
                                        <th> {{ __('lang.middle_name')}} </th>
                                        <th> {{ __('lang.phone')}} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($students as $student)
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src={{asset($student->profile_image)}} alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                {{$student->first_name}}
                                            </td>

                                            <td>
                                                {{$student->last_name}}
                                            </td>

                                            <td>
                                                {{$student->middle_name}}
                                            </td>

                                            <td>
                                                {{$student->phone}}
                                            </td>
                                        </tr>
                                    @empty       
                        
                                    @endforelse 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

                <div class="col-xl-6">
                    <div class="card-box">                       
                        <h4 class="header-title mb-3"> {{ __('lang.home_teacher')}} </h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-nowrap table-centered m-0 text-center">

                                <thead class="thead-light">
                                    <tr>
                                        <th> {{ __('lang.profile_image')}} </th>
                                        <th> {{ __('lang.first_name')}} </th>
                                        <th> {{ __('lang.last_name')}} </th>
                                        <th> {{ __('lang.middle_name')}} </th>
                                        <th> {{ __('lang.phone')}} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($teachers as $teacher)
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src={{asset($teacher->profile_image)}} alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                {{$teacher->first_name}}
                                            </td>

                                            <td>
                                                {{$teacher->last_name}}
                                            </td>

                                            <td>
                                                {{$teacher->middle_name}}
                                            </td>

                                            <td>
                                                {{$teacher->phone}}
                                            </td>
                                        </tr>
                                    @empty       
                        
                                    @endforelse 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
              
            </div>
        </div> 
    </div> 

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2020 - <script>document.write(new Date().getFullYear())</script> &copy; by <a href="">Ilona Melochek</a> 
                </div>
                <div class="col-md-6">
                  
                </div>
            </div>
        </div>
    </footer>
 

</div>

@endsection