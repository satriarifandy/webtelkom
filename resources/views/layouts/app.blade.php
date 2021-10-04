<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('includes.home.style')
  <title>Telkom Witel NTB</title>

</head>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
          <div class="container-fluid">
            <nav class="navbar fixed-top navbar-expand-lg custom_nav-container" style="background-color: #08135c; border-bottom: 3px solid red">
              <a class="navbar-brand" href="/">
                <span style="margin-right: 0.1cm; margin-left: 0.5cm">
                  Telkom Witel NTB
                </span>
              </a>
              <img src="{{asset('telkom/images/telkom_logo2.png')}}" style="width:70px;">
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="/">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/#about">Tentang Kami</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/#bidang">Bidang Praktik</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/#testimoni">Testimoni</a>
                  </li>
                  
    
                  @auth
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent; border-color: transparent">
                      {{ strtoupper(Auth::user()->name) }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();">Logout</a>
                    </form>
                    </div>
                  </div>
                  @endauth
    
                  @guest
                  <li class="nav-item">
                    <a class="nav-link" href="/login">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <span>
                        Masuk
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/register">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <span>
                        Registrasi
                      </span>
                    </a>
                  </li>
                  @endguest
                </ul>
              </div>
            </nav>
          </div>
        </header>
        <!-- end header section -->
      </div>

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Telkom Witel NTB</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  @include('includes.home.script')

</body>

</html>