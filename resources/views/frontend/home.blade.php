@extends('layouts/app')
@extends('layouts/frontnav')
@section('content')


  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>{{ __('lang.title')}}</h1>
      <h2></h2>
      <a href="" class="btn-get-started">{{ __('lang.get_started')}}</a>
    </div>
  </section>

  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{ __('lang.welcome')}}</h2>         
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{asset('frontend/assets/img/about.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>{{ __('lang.home_title')}}</h3>
            <p class="font-italic">
              {{ __('lang.home_explain')}}
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> {{ __('lang.home_item1')}} </li>
              <li><i class="icofont-check-circled"></i> {{ __('lang.home_item2')}}</li>
              <li><i class="icofont-check-circled"></i> {{ __('lang.home_item3')}}</li>
            </ul>
            <p>
              {{ __('lang.home_explain')}}
            </p>
           
          </div>
        </div>

      </div>
    </section>

    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">1232</span>
            <p>{{ __('lang.home_student')}}</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">64</span>
            <p>{{ __('lang.home_teacher')}}</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">15</span>
            <p>{{ __('lang.home_course')}}</p>
          </div>
        </div>

      </div>
    </section>


    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>{{ __('lang.home_popular')}}</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{asset('frontend/assets/img/course-1.jpg')}}" class="img-fluid" alt="...">
                
              </div>
            </div>
         

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="{{asset('frontend/assets/img/course-2.jpg')}}" class="img-fluid" alt="...">
                <div class="course-content">
                </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
              <div class="course-item">
                <img src="{{asset('frontend/assets/img/course-3.jpg')}}" class="img-fluid" alt="...">
                  <div class="course-content">
                  </div>
              </div>
          </div> 

        </div>

      </div>
    </section>


  </main>

 
@endsection
 
