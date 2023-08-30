@extends('layouts.master')
    
  <!-- Favicons -->
  <link href="{{asset('main/img/favicon.png')}}" rel="icon">
  <link href="{{asset('main/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('main/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('main/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('main/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('main/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('main/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('main/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('main/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('main/css/style.css')}}" rel="stylesheet">


  @section('master-main')
  <main id="main" class="mt-5">
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="{{asset('main/img/portfolio/portfolio-1.jpg')}}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{asset('main/img/portfolio/portfolio-2.jpg')}}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{asset('main/img/portfolio/portfolio-3.jpg')}}" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Bola de Basquete </h3>
              <ul>
                <li><strong>Categoria</strong>: Basquete </li>
                <li><strong>Quantidade Total</strong>: 3 </li>
                <li><strong>Quantidade Disponível</strong>: 1 </li>
                <li><strong>Data</strong>: 01 Março, 2020</li>
              </ul>
              <hr>

              <div class="d-flex justify-content-center ">
                <a href="/inproduction" class="btn btn-success w-100">Alugar</a>
              </div>

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
  </main><!-- End #main -->
  @endsection

  <!-- Vendor JS Files -->
  <script src="{{asset('main/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('main/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('main/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('main/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('main/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('main/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('main/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('main/js/main.js')}}"></script>

