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
                                
                                <div class="form-group mb-3">
                                    <label for="teacher_name">{{ __('lang.teacher_name')}}</label>
                                    <select name="teacher_name" id="teacher_name" class="form-control teacher_name">
                                        <option value="">Please select the Teacher</option>
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
                                    <label for="password">{{ __('lang.login_password')}}</label>
                                    <input type="password" name="password" id="" class="form-control" placeholder="Please input your Password">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="confirm_password">{{ __('lang.confirm_password')}}</label>
                                    <input type="password" name="confirm_password" id="" class="form-control" placeholder="Please confirm your Password">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
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
            $('.teacher_name').change(function(){
                var teacher_name = $(this).children("option:selected").val();
                $(".teacher_name option").each(function() {
                    if($(this).val() == teacher_name)
                        $("#studend_classFrom .id").val($(this).data('id'));
                });
            });           
        });
    </script>
@endsection