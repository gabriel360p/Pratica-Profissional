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
    <div class="row text-center mb-3">
        <span class="display-4">Categorias</span>
    </div>

    <div class="container p-2">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="table-responsive bg-white">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th scope="col">Categorias</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($categories as $categorie)
                        
                    <td>{{$categorie->name}}</td>

                    <td>
                      <a class="btn btn-success" href="{{url('/categories/destroy',['categorie'=>$categorie->id])}}">Apagar</a>
                      <a class="btn btn-success" href="{{route('categories.edit',['categorie'=>$categorie->id])}}">Editar</a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    

@endsection
<!-- JS -->
<script src="{{asset('cadastro_itens/jquery/jquery.min.js')}}"></script>
<script src="{{asset('cadastro_itens/js/main.js')}}"></script>