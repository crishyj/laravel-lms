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

                            <h4 class="header-title text-center">{{ __('lang.create_student')}}</h4>

                            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="first_name">{{ __('lang.first_name')}}</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder={{ __('lang.first_name')}} required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="last_name">{{ __('lang.last_name')}}</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder={{ __('lang.last_name')}} required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="middle_name">{{ __('lang.middle_name')}}</label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder={{ __('lang.middle_name')}}>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">{{ __('lang.email')}}</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="birthday">{{ __('lang.birthday')}}</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder={{ __('lang.birthday')}} required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="address">{{ __('lang.address')}}</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder={{ __('lang.address')}} required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="grade">{{ __('lang.grade_name')}}</label>
                                    <select name="grade_id" id="grade_id" class="form-control grade_id">
                                        @foreach ($options as $option)
                                            <option value="{{$option->id}}">{{$option->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="last_school">{{ __('lang.last_school')}}</label>
                                    <input type="text" name="last_school" id="last_school" class="form-control" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="last_grade">{{ __('lang.last_grade')}}</label>
                                    <input type="text" name="last_grade" id="last_grade" class="form-control" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone">{{ __('lang.phone')}}</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="123-456-7890" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="profile_image">{{ __('lang.profile_image')}}</label>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="parent1_first">{{ __('lang.parent1_first_name')}}</label>
                                    <input type="text" name="parent1_first" id="parent1_first" class="form-control" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="parent1_last">{{ __('lang.parent1_last_name')}}</label>
                                    <input type="text" name="parent1_last" id="parent1_last" class="form-control" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="parent1_phone">{{ __('lang.parent1_phone')}}</label>
                                    <input type="phone" class="form-control" id="parent1_phone" name="parent1_phone" placeholder="123-456-7890" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="parent2_first">{{ __('lang.parent2_first_name')}}</label>
                                    <input type="text" name="parent2_first" id="parent2_first" class="form-control" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="parent1_last">{{ __('lang.parent2_last_name')}}</label>
                                    <input type="text" name="parent2_last" id="parent1_last" class="form-control" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="parent2_phone">{{ __('lang.parent2_phone')}}</label>
                                    <input type="phone" class="form-control" id="parent2_phone" name="parent2_phone" placeholder="123-456-7890" required>
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