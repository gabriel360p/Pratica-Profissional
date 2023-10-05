@extends('layouts.master')
<!-- Font Icon -->
    <link rel="stylesheet" href="">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('cadastro_itens/css/style.css')}}">

    <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">


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

 <div class="container">
    <div class="signup-content">
        <div class="signup-form">
            <h2 class="form-title">Devolver Item</h2>
            <form method="GET" class="register-form " id="register-form" action="/inproduction">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" readonly id="name" placeholder="Nome Do Item" value="Bola de Futebol"/>
                    <small id="helpId" class="form-text text-muted">Nome do Item</small>
                </div>

                <div class="form-group">
                    <input type="date" required name=""/>
                    <small id="helpId" class="form-text text-muted">Data de Devolução</small>
                </div>

                <div class="form-group">
                    <input type="number" required name="name" id="name" placeholder="Matrícula" value=""/>
                    <small id="helpId" class="form-text text-muted">Quem devolveu</small>
                </div>

                <div class="form-group">
                    <input type="number" readonly name="name" id="name" placeholder="Matrícula" value=""/>
                    <small id="helpId" class="form-text text-muted">Quem Recebeu</small>
                </div>

                <div class="form-group">
                    <select class="form-select form-select-lg" name="" id="">
                        <option value="">Bom</option>
                    </select>
                    <small id="helpId" class="form-text text-muted">Estado do Item</small>
                </div>

                <div class="mb-3">
                  <label for="" class="form-label"></label>
                  <textarea class="form-control" name="" id="" rows="3"></textarea>
                  <small id="helpId" class="form-text text-muted">Observação</small>
                </div>

                <div class="form-group form-button">
                    <button class="form-submit border border-none">Salvar</button>
                </div>
            </form>
        </div>

        <div class="signup-image">
            {{-- <figure><img src="{{asset('cadastro_itens/images/signup-image.jpg')}}"alt="sing up image"></figure> --}}
        </div>
        
    </div>
</div>


@endsection
<!-- JS -->
<script src="{{asset('cadastro_itens/jquery/jquery.min.js')}}"></script>
<script src="{{asset('cadastro_itens/js/main.js')}}"></script>