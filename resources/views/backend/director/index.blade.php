@extends('layouts/backMain')

@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">
                        
                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="" height="100">
                                    </span>
                                </a>
            
                                <a href="" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{asset('backend/images/logo-light.png')}}" alt="" height="100">
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">
                                {{ __('lang.login_explain')}}
                            </p>
                        </div>

                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="emailaddress"> {{ __('lang.login_email')}}</label>
                                <input class="form-control" type="email" id="emailaddress" name ="email" required="" placeholder={{ __('lang.enter_email')}}>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password"> {{ __('lang.login_password')}} </label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name = "password" class="form-control" placeholder={{ __('lang.enter_password')}}>
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="userType"> {{ __('lang.login_usertype')}} </label>
                                <select name="userType" id="" class="form-control userType" required>
                                    <option value=""> {{ __('lang.login_userlevel')}} </option>
                                    <option value="1"> {{ __('lang.student')}} </option>
                                    <option value="2"> {{ __('lang.teacher')}} </option>
                                    <option value="3"> {{ __('lang.administrator')}} </option>
                                    <option value="4"> {{ __('lang.director')}} </option>
                                </select>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit">  {{ __('lang.login')}}  </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="rightbar-overlay"></div>
@endsection
