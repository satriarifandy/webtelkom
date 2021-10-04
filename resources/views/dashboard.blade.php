
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

<div>
  @if (session('success'))
  <script>
    Swal.fire({
    title: 'Pendaftaran kamu telah terkirim',
    icon: 'success'
    })
  </script>
  @endif

  <!-- about section -->
  <section class="about_section layout_padding" data-aos="zoom-in" data-aos-duration="1000">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Tentang Kami
              </h2>
            </div>
            <p>
              Program KP/Magang/PKL Telkom Witel NTB memberikan kesempatan bagi mahasiswa/i dan siswa/i untuk melakukan 
              penelitian atau mendukung program kerja di lingkungan bisnis Telkom Witel NTB dalam jangka waktu 1 bulan sampai dengan 3 bulan. 
              Banyak manfaat yang akan kamu dapatkan setelah kamu mengikuti Program KP/Magang/PKL Telkom Witel NTB.
            </p>
            <a href="#need">
              Lihat Detail
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{asset('/telkom/images/about-img.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

  <!--need section -->
  <section id="need" class="job_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 data-aos="zoom-in" data-aos-duration="1000">
          WHAT WE NEED
        </h2>
      </div>
      <div class="job_container"  style="color: black">
        <div class="col d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000">
          <div class="card" style="margin-bottom: 0.7cm; width: 20cm;">
            <div class="card-body">
              Mahasiswa/i aktif S1 tingkat 3 (min semester 6) atau D3 tingkat 2 (min semester 4)<i class="fa fa-check-circle fa-3x" style="color: green; float: right"></i>
              dan Siswa/i SMK aktif
            </div>
          </div>
        </div>
        
        <div class="col d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000">
          <div class="card" style="margin-bottom: 0.7cm; width: 20cm;">
            <div class="card-body">
              Berkomitmen kerja penuh waktu (Senin-Jum'at) selama 1-6 bulan. <i class="fa fa-check-circle fa-3x" style="color: green; float: right"></i>
            </div>
          </div>
        </div>

        <div class="col d-flex justify-content-center" style="margin-bottom: 0cm" data-aos="zoom-in" data-aos-duration="1000">
          <div class="card" style="margin-bottom: 0.7cm; width: 20cm;">
            <div class="card-body">
              Mampu berkomunikasi dengan baik serta dapat bekerja dalam tim maupun mandiri. <i class="fa fa-check-circle fa-3x" style="color: green; float: right"></i>
            </div>
          </div>
        </div>
        
      </div>

    </div>
  </section>
  <!--need section -->

  <!--will you get section -->
  <section class="job_section layout_padding" style="background-color: #ffffff; color: black">
    <div class="container">
      <div class="heading_container heading_center" data-aos="zoom-in" data-aos-duration="1000">
        <h2>
          WHAT WILL YOU GET
        </h2>
      </div>
      <div class="job_container">
        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in-left" data-aos-duration="1000">
            <div class="box">
              <div class="job_content-box">
                <div class="img-box">
                  <img src="{{asset('/telkom/images/job_logo1.png')}}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Program Certificate
                  </h5>
                  <div class="detail-info">
                    <h6>
                      <span>
                        Mendapatkan sertifikat sebagai apresiasi atas kontribusi yang telah diberikan.
                      </span>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="box">
              <div class="job_content-box">
                <div class="img-box">
                  <img src="{{asset('/telkom/images/job_logo1.png')}}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Real Project Challenge
                  </h5>
                  <div class="detail-info">
                    <h6>
                      <span>
                        Terjun langsung dalam use case nyata pada berbagai disiplin ilmu.
                      </span>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1000">
            <div class="box">
              <div class="job_content-box">
                <div class="img-box">
                  <img src="{{asset('/telkom/images/job_logo1.png')}}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Experience in National & Worldwide Company
                  </h5>
                  <div class="detail-info">
                    <h6>
                      <span>
                        Pengalaman internship di perusahaan terkemuka, sebagai gerbang karir.
                      </span>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1000">
            <div class="box">
              <div class="job_content-box">
                <div class="img-box">
                  <img src="{{asset('/telkom/images/job_logo1.png')}}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Final Assignment Project
                  </h5>
                  <div class="detail-info">
                    <h6>
                      <span>
                        Berbagai use case dapat dijadikan topik untuk Tugas Akhir (TA) dengan supervisor internship sebagai pembimbing.
                      </span>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!--will you get section -->


  <!--bidang section -->
  <section id="bidang" class="job_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center" data-aos="zoom-in" data-aos-duration="1000">
        <h2>
          DAFTAR PEKERJAAN DI TELKOM WITEL NTB
        </h2>
      </div>
      <div class="job_container">
        <div class="row">
          @foreach ($units as $key=>$value)
          <div class="col-lg-6">
            <div class="box" data-aos="zoom-in" data-aos-duration="1000">
              <div class="job_content-box" style="margin-bottom: 0.5cm">
                <div class="img-box">
                  <img src="{{asset('/telkom/images/job_logo')}}{{$value->id}}{{'.png'}}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    {{ $value->nama_unit }}
                  </h5>
                  <div class="detail-info">
                    <h6>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      <span>
                        Mataram, Lombok
                      </span>
                    </h6>
                  </div>
                </div>
              </div>
              <div class="option-box">
                <a href="unit/details/{{ $value->id }}" class="apply-btn" style="margin-left: 0.15cm">
                  Daftar 
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>


    </div>
  </section>
  <!--need section -->

  <!-- testimoni section -->
  <section class="expert_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimoni
        </h2>
        <p>
          Testimoni kerja praktik dari teman-teman yang sudah pernah kerja praktek di Telkom Witel NTB.
        </p>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{asset('/telkom/images/e1.jpg')}}" alt="">
            </div>
            <div class="detail-box">
              <a href="">
                Mark Lee
              </a>
              <h6 class="expert_position">
                <span>
                  Access Optima & Area Network
                </span>
                <span>
                  
                </span>
              </h6>
              <!-- <span class="expert_rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </span> -->
              <p>
                Disini saya belajar bagaimana jaringan internet (HSI) bekerja dari pelanggan sampai ke perangkat radius.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{asset('/telkom/images/e2.jpg')}}" alt="">
            </div>
            <div class="detail-box">
              <a href="">
                Salsabila K
              </a>
              <h6 class="expert_position">
                <span>
                  UI Designer
                </span>
                <span>
                  
                </span>
              </h6>
              <!-- <span class="expert_rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </span> -->
              <p>
                Saya mendapatkan pengalaman yang berharga yaitu belajar cara membuat tampilan User Interface.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{asset('/telkom/images/e3.jpg')}}" alt="">
            </div>
            <div class="detail-box">
              <a href="">
                Jeong Jaehyun
              </a>
              <h6 class="expert_position">
                <span>
                  Consumer Service
                </span>
                <span>
                  
                </span>
              </h6>
              <!-- <span class="expert_rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </span> -->
              <p>
                Banyak sekali pengalaman yang saya dapatkan salah satunya bagaimana cara melayani consumer secara baik.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- testimoni section -->
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