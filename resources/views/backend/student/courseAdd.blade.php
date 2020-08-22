@extends('layouts/backMain')
@extends('layouts/directorSide')

@section('content')

    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">

                            <h4 class="header-title text-center">{{ __('lang.student_course_list')}}</h4>

                            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data" id ="studend_classFrom">
                                @csrf
                                <input type="hidden" name="id" class="id" id ="id" />

                                <div class="form-group mb-3">
                                    <label for="student_name">{{ __('lang.student_name')}}</label>
                                    <select name="student_name" id="student_name" class="form-control student_name">
                                        <option value="">{{ __('lang.select_student')}}</option>
                                        @foreach ($students as $student)
                                            @php
                                                $student_name = $student->first_name." ".$student->last_name." ".$student->middle_name
                                            @endphp
                                            <option data-id="{{$student->id}}" value="{{$student_name}}">{{$student_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="course_name">{{ __('lang.course_name')}}</label>
                                    <select name="course_name" id="course_name" class="form-control course_name">
                                        <option value="">{{ __('lang.select_course')}}</option>
                                        @foreach ($courses as $course)                                          
                                            <option value="{{$course->name}}">{{ $course->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">{{ __('lang.save')}}</button>
                                </div>
                            </form>

                        </div> 
                    </div> 
                </div> 

            </div>
        </div>
    </div>

@endsection

@section('after_script')
    <script>
        $(document).ready(function(){
            $('.student_name').change(function(){
                var student_name = $(this).children("option:selected").val();
                $(".student_name option").each(function() {
                    if($(this).val() == student_name)
                        $("#studend_classFrom .id").val($(this).data('id'));
                });
            });           
        });
    </script>
@endsection