
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
  
  <div class="container">
    <nav aria-label="breadcrumb" style="margin-top: 1cm">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="/" style="color: grey">Beranda</a></li>
          <li class="breadcrumb-item active"><a href="/" style="color: grey">Bidang Praktik</a></li>
          <li class="breadcrumb-item" aria-current="page" style="color: #08135c">{{ $units->nama_unit }}</li>
        </ol>
    </nav>
    <h1 class="text-center" style="margin-bottom: 0.7cm">{{ $units->nama_unit }}</h1>
    <div class="row">
        <div class="col-lg-6">
            <img src="{{asset('/telkom/images/slider-bg.jpg')}}" style="width: 450px; margin-bottom: 2cm">
        </div>
        <div class="col-lg-6">
            <h6 style="margin-top: 0.5cm; text-align: justify; line-height: 1.5">{{ $units->penjelasan }}</h6>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        @guest
          <!-- Button trigger modal -->
          <a href="" class="btn-lg" data-toggle="modal" data-target="#exampleModalCenter" style="
          margin-bottom: 2cm;
          background-color: #08135c;
          color: white;
          ">
          Daftar 
          </a>

          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h1><i class="fa fa-exclamation-triangle"></i></h1>
                  <h5 class="modal-title" id="exampleModalLongTitle" style="margin-left: 1cm">Log In Untuk Melanjutkan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Silakan log in untuk melanjutkan. Jika Kamu belum memiliki akun, register terlebih dahulu.
                </div>
                <div class="modal-footer">
                  <a href="/register" class="btn" style="
                  background-color: #08135c;
                  color: white;
                  ">Register</a>
                  <a href="/login" class="btn" style="
                  background-color: #08135c;
                  color: white;
                  ">Login</a>
                </div>
              </div>
            </div>
          </div>
        @endguest
        @auth()
          <a href="/unit/details/{{ $units->id }}/daftar" class="btn-lg" style="
          margin-bottom: 2cm;
          background-color: #08135c;
          color: white;
          ">
          Daftar 
          </a>
        @endauth
    </div>

  </div>

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">

        <div class="col-md-5">
          <div class="info_alamat">
            <h4>Telkom Witel Nusa Tenggara Barat</h4>
            <a href="https://goo.gl/maps/gbxNURpYVBy8FHvK6">
            <p>Jl. Pendidikan No.23, Dasan Agung Baru, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83125</p>
            </a>
          </div>
        </div>

        <div class="col-md-7 d-flex justify-content-end">
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