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

                            <h4 class="header-title text-center"> {{ __('lang.create_student')}} </h4>

                            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="grade"> {{ __('lang.select_grade')}} </label>
                                    <select name="grade_id" id="grade_id" class="form-control">
                                        @foreach ($options as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name"> {{ __('lang.class_name')}} </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder= {{ __('lang.class_name')}}  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit"> {{ __('lang.save')}} </button>
                                </div>
                            </form>

                        </div> 
                    </div> 
                </div> 

            </div>
        </div>
    </div>

@endsection