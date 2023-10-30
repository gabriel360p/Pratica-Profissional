@extends('layouts.master')
<!-- Main css -->
<link rel="stylesheet" href="{{ asset('cadastro_itens/css/style.css') }}">

@section('master-main')
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Cadastrar Local</h2>
                <form method="POST" class="register-form " id="register-form" action="{{url('locais')}}">
                    @csrf

                    <div class="form-group">
                        <input type="text" required name="nome" placeholder="Nome Do Local"
                            value="{{ @old('nome') }}" />
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
<script src="{{ asset('cadastro_itens/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('cadastro_itens/js/main.js') }}"></script>
