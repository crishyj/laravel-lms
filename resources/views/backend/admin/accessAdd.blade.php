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

                            <h4 class="header-title text-center"> {{ __('lang.add_permission_admin')}} </h4>

                            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data" id ="studend_classFrom">
                                @csrf
                                <input type="hidden" name="id" class="id" id ="id" />
                                
                                <div class="form-group mb-3">
                                    <label for="admin_name"> {{ __('lang.admin_name')}} </label>
                                    <select name="admin_name" id="admin_name" class="form-control admin_name">
                                        <option value=""> {{ __('lang.select_admin_name')}} </option>
                                        @foreach ($admins as $admin)
                                            @php
                                                $admin_name = $admin->first_name." ".$admin->last_name." ".$admin->middle_name
                                            @endphp
                                            <option data-id="{{$admin->id}}" value="{{$admin_name}}">{{$admin_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password"> {{ __('lang.login_password')}} </label>
                                    <input type="password" name="password" id="" class="form-control" placeholder="Please input your Password">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="confirm_password"> {{ __('lang.confirm_password')}} </label>
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
            $('.admin_name').change(function(){
                var admin_name = $(this).children("option:selected").val();
                $(".admin_name option").each(function() {
                    if($(this).val() == admin_name)
                        $("#studend_classFrom .id").val($(this).data('id'));
                });
            });           
        });
    </script>
@endsection