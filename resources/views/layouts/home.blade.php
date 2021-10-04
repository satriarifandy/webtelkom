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
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/">
            <span style="margin-right: 0.1cm">
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
                <a class="nav-link" href="#about">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#bidang">Bidang Praktik</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#testimoni">Testimoni</a>
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

  {{ $slot }}

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-2 info_links">
          <h4>
            Menu
          </h4>
          <ul>
            <li class="active">
              <a href="index.html">
                Beranda
              </a>
            </li>
            <li>
              <a href="about.html">
                Tentang
              </a>
            </li>
            <li>
              <a class="" href="job.html">
                Bidang Praktik
              </a>
            </li>
            <li>
              <a class="" href="freelancer.html">
                Informasi Program
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h4>
            
          </h4>
          <p>
            
          </p>
        </div>
        <div class="col-md-3">
          <div class="info_social">
            <h4>
              Media Sosial
            </h4>
            <div class="social_container">
              <div>
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </div>
              <div>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </div>
              <div>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <div>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info_form">
            <h4>
              Dapatkan Pemberitahuan
            </h4>
            <form action="">
              <input type="text" placeholder="Masukkan Email" />
              <button type="submit">
                Berlangganan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->

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