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

                            <h4 class="header-title text-center">{{ __('lang.create_teacher')}}</h4>

                            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="first_name">{{ __('lang.first_names')}}</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder={{ __('lang.first_names')}} required>
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
                                    <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="birthday">{{ __('lang.birthday')}}</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Last name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="address">{{ __('lang.address')}}</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="subject">{{ __('lang.subject')}}</label>
                                    <input type="text" name="subject" id="subject" class="form-control" required>
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