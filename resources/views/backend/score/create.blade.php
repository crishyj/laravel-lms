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

                            <h4 class="header-title text-center">Add Grade to Student</h4>

                            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data" id ="studend_classFrom">
                                @csrf
                                <input type="hidden" name="student_id" class="student_id" id ="student_id" />
                                
                                <div class="form-group mb-3">
                                    <label for="student_name">Student name</label>
                                    <select name="student_name" id="student_name" class="form-control student_name" required>
                                        <option value="">Please select the Student</option>
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
                                    <label for="assignment_id">Assignments</label>
                                    <select name="assignment_id" id="assignment_id" class="form-control assignment_id" required>
                                        <option value="">Please Select Assignment Name</option>    
                                        @foreach ($assignments as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="score">Grade</label>
                                    <input type="number" name="score" step=0.01 class="form-control score" required/> 
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Save</button>
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
                        $("#studend_classFrom .student_id").val($(this).data('id'));
                });
            });           
        });
    </script>
@endsection