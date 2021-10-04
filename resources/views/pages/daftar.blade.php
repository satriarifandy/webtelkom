
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
    <nav aria-label="breadcrumb" style="margin-top: 1cm">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="/" style="color: grey">Beranda</a></li>
          <li class="breadcrumb-item active"><a href="/" style="color: grey">Bidang Praktik</a></li>
          <li class="breadcrumb-item active"><a href="/unit/details/{{ $units->id }}" style="color: grey">{{ $units->nama_unit }}</a></li>
          <li class="breadcrumb-item" aria-current="page" style="color: #08135c">Daftar</li>
        </ol>
    </nav>

    <h1 style="text-align: center">Apply Now</h1>
    
    <form method="POST" action="/unit/details/{{ $units->id }}/daftar" enctype="multipart/form-data">
        @csrf
      <div class="row justify-content-md-center">
        <div class="col-md-8">
            
          <label class="mt-2" for="isi">Nama Lengkap</label>
          <input class="form-control" id="nama" name="nama" placeholder="">

          <label class="mt-2" for="isi">Jenis Kelamin</label>
            <select class="form-control" id="kelamin" name="kelamin">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            
          <label class="mt-2" for="isi">Asal Institusi Pendidikan</label>
          <input class="form-control" id="institusi" name="institusi" placeholder="">
    
          <label class="mt-2" for="isi">Jurusan</label>
          <input class="form-control" id="jurusan" name="jurusan" placeholder="">

          <label class="mt-2" for="isi">Alamat</label>
          <input class="form-control" id="alamat" name="alamat" placeholder="">
            
          <label class="mt-2" for="isi">Unit PKL/Magang</label>
          <input class="form-control" name="unit" type="text" placeholder="{{ $units->nama_unit }}" value="{{ $units->nama_unit }}" readonly>

          <label class="mt-3" for="isi">Motivasi Mengikuti PKL/Magang di Telkom</label>
          <textarea class="form-control my-editor" id="motivasi" name="motivasi"></textarea>

          <div class="mb-3">
            <label style="margin-top: 0.5cm" for="foto" class="form-label">Foto formal 3x4 atau 4x6</label>
            <input class="form-control" type="file" id="foto" name="foto">
          </div>

          <div class="mb-3">
            <label style="margin-top: 0.5cm" for="surat" class="form-label">Surat Pengantar dari Sekolah/Kampus (Dalam bentuk Scan pdf)</label>
            <input class="form-control" type="file" id="surat" name="surat">
          </div>

          <div class="mb-3">
            <label style="margin-top: 0.5cm" for="formFile" class="form-label">Resume/CV</label>
            <input class="form-control" type="file" id="cv" name="cv">
          </div>

          @guest
          <!-- Button trigger modal -->
          <div class="d-flex justify-content-end">
            <a href="" class="btn-lg" data-toggle="modal" data-target="#exampleModalCenter" style="
            margin-bottom: 2cm;
            background-color: #08135c;
            color: white;
            ">
            Kirim
            </a>
          </div>

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
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn-lg" style="
                    margin-bottom: 2cm;
                    background-color: #08135c;
                    border-color: transparent;
                    color: white;
                    ">
                    Kirim
                </button>
            </div>
           @endauth

          {{-- <div class="d-flex justify-content-end">
            <button class="btn-lg" style="
                margin-bottom: 2cm;
                background-color: #08135c;
                border-color: transparent;
                color: white;
                ">
                Kirim
            </button>
          </div> --}}

        </div>
      </div>
    </form>

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