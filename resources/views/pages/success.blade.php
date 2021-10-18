
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
              @php
                $role = Auth::user()->role;
              @endphp
              @if ($role == 'admin')
                <li class="nav-item">
                  <a class="nav-link" href="/admin">Admin Dashboard</a>
                </li>
              @endif   
              @endauth 
              

              @auth
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent; border-color: transparent">
                  {{ strtoupper(Auth::user()->name) }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
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
  
  <div class="container">
    <div class="alert alert-success" role="alert" style="margin-top: 2cm; margin-bottom: 5cm">
        <h4 class="alert-heading">Pendaftaran Kamu Telah Terkirim!</h4>
        <p>Silahkan menghubungi kontak berikut untuk mengkonfirmasi bahwa anda telah mendaftar PKL di Telkom Witel NTB.</p>
        <hr>
        <p class="mb-0">Pak Irwan (Whatsapp/Telegram):  085337020644</p>
      </div>
  </div>

<!-- info section -->
<section class="info_section ">
  <div class="container">
    <div class="row">
      <div class="col-md-1">
        <img src="{{asset('telkom/images/telkom_logo2.png')}}" style="width:150px;">
      </div>
      <div class="col-md-6">
        <div class="info_alamat" style="margin-left: 1.3cm; margin-top: 0.5cm">
          <h4>Telkom Witel Nusa Tenggara Barat</h4>
          <a href="https://goo.gl/maps/gbxNURpYVBy8FHvK6">
          <p>Jl. Pendidikan No.23, Dasan Agung Baru, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83125</p>
          </a>
        </div>
      </div>

      <div class="col-md-5 d-flex justify-content-end">
        <div class="info_social" style="margin-top: 0.5cm">
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