@extends('layouts.master')

<!-- Main css -->
<link rel="stylesheet" href="{{ asset('cadastro_itens/css/style.css') }}">

@section('master-main')
    <div class="container">
        <div class="signup-content ">
            <div class="signup-form mt-4">
                <h2 class="form-title">Editar item</h2>
                <form method="GET" class="register-form " id="register-form" action="/inproduction">
                    @csrf
                    <div class="form-group">
                        <input type="text" required name="name" id="name" placeholder="Nome Do Item"
                            value="" />
                    </div>

                    <div class="form-group">
                        <select class="custom-select " required id="CustomSelect">
                            <option selected>Categoria</option>
                            <option value="1">Futebol</option>
                            <option value="2">Voleibol</option>
                            <option value="3">Basquete</option>
                        </select>
                    </div>

                    <div class="form-group">

                        <select class="custom-select " required id="CustomSelect">
                            <option selected>Local de armazenamento</option>
                            <option value="1">Depósito 1</option>
                            <option value="2">Depósito 2</option>
                            <option value="3">Depósito 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="date" readonly name="" id="name" />
                        <div class="form-text">Data de Entrada</div>
                    </div>

                    <div class="mb-3">
                        <input type="file" class="form-control" name="" id="" placeholder=""
                            aria-describedby="fileHelpId">
                        <div id="fileHelpId" class="form-text">Escolher Foto</div>
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
