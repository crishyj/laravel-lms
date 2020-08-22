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

                            <h4 class="header-title text-center">{{ __('lang.teacher_add_class')}}</h4>

                            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data" id ="studend_classFrom">
                                @csrf
                                <input type="hidden" name="id" class="id" id ="id" />
                                <input type="hidden" name="grade_id" class="grade_id">
                                <input type="hidden" name="classes_id" class="classes_id">
                                <div class="form-group mb-3">
                                    <label for="teacher_name">{{ __('lang.teacher_name')}}</label>
                                    <select name="teacher_name" id="teacher_name" class="form-control teacher_name" required>
                                        <option value="">{{ __('lang.select_teacher')}}</option>
                                        @foreach ($teachers as $teacher)
                                            @php
                                                $teacher_name = $teacher->first_name." ".$teacher->last_name." ".$teacher->middle_name
                                            @endphp
                                            <option data-id="{{$teacher->id}}" value="{{$teacher_name}}">{{$teacher_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="student_grade">{{ __('lang.grade_name')}}</label>
                                    <select name="student_grade" id="student_grade" class="form-control student_grade" required>
                                        <option value="">{{ __('lang.select_grade')}}</option>
                                        @foreach ($grades as $grade)                                          
                                            <option value="{{$grade->id}}">{{ $grade->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="student_class">{{ __('lang.class_name')}}</label>
                                    <select name="student_class" id="student_class" class="form-control student_class" required>
                                        <option vlaue = "">{{ __('lang.select_class')}}<option>
                                        @foreach ($classes as $item)                                          
                                            <option data-grade="{{$item->grade_id}}" value="{{$item->id}}" class="student_class_item">
                                                {{ $item->name}}
                                            </option>
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
            $('.teacher_name').change(function(){
                var teacher_name = $(this).children("option:selected").val();
                $(".teacher_name option").each(function() {
                    if($(this).val() == teacher_name)
                        $("#studend_classFrom .id").val($(this).data('id'));
                });
            });

            $(".student_grade").change(function(){
                $("#student_class option").each(function() {
                    $(this).css('display', 'none');
                })
                var student_grade = $(this).children("option:selected").val();
                $("#studend_classFrom .grade_id").val(student_grade);

                $("#student_class option").each(function() {
                    if($(this).data('grade') == student_grade){
                        $(this).css('display', 'block');                       
                    }                        
                });
            });

            $('.student_class').change(function(){
                var classes_id = $(this).children("option:selected").val();
                $('.classes_id').val(classes_id);
            });
        });
    </script>
@endsection