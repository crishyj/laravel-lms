<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto">
        <a href="{{ route('/') }}">{{ config('app.name', 'Laravel') }}</a>
      </h1>
    
      <nav class="nav-menu d-none d-lg-block">
        <ul>
            @php 
                $locale = session()->get('locale'); 
            @endphp
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  @switch($locale)
                      @case('us')
                        <img src="{{asset('backend/images/flags/us.jpg')}}"> English
                        @break
                      
                      @case('fr')
                        <img src="{{asset('backend/images/flags/fr.jpg')}}"> French
                        @break
                      
                      @default
                        <img src="{{asset('backend/images/flags/us.jpg')}}"> English
                  @endswitch
                  <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="lang/en"><img src="{{asset('backend/images/flags/us.jpg')}}"> English</a>
                  <a class="dropdown-item" href="lang/fr"><img src="{{asset('backend/images/flags/fr.jpg')}}"> French</a>
              </div>
          </li>
          <li> <a href="{{route('director.login')}}" class="get-started-btn">Login</a></li>
        </ul>
      </nav>
      

    </div>
  </header>