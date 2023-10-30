@extends('layouts.master')

<link rel="stylesheet" href="{{ asset('cadastro_itens/css/style.css') }}">

@section('master-main')
    <div class="signup-content">
        <div class="signup-form">
            <h2 class="form-title">Cadastro de Material</h2>

            <form method="POST" class="register-form " action="{{ url('materiais') }}">
                @csrf
                <div class="form-group">
                    <input type="text" required name="nome"value="{{ @old('nome') }}" placeholder="Nome do material"
                        value="" />
                </div>
                {{-- 
                <div class="form-group">
                    <select class="custom-select" name="categoria_id" required id="CustomSelect">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div> --}}

                @foreach ($categorias as $categoria)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $categoria->id }}" name="categorias[]"
                            id="flexCheckDefault">
                        {{ $categoria->nome }}
                    </div>
                @endforeach

                @error('name')
                    <span class="badge bg-warning">{{ $message }}</span>
                @enderror

                <div class="form-group form-button">
                    <button class="form-submit border border-none">Salvar</button>
                </div>

            </form>

            <button type="button" class="form-submit border border-none" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Nova Categoria
            </button>
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="m-5">
                    <h2 class="form-title">Nova Categoria</h2>

                    <form method="POST" class="register-form " action="/categorias">
                        @csrf
                        <div class="form-group">
                            <input type="text" required name="nome" id="name" placeholder="Nome Da Categoria"
                                value="{{ @old('nome') }}" />
                        </div>
                        @error('nome')
                            <span class="badge bg-warning">{{ $message }}</span>
                        @enderror

                        <div class="form-group form-button">
                            <button class="form-submit border border-none">Salvar</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
<!-- JS -->
<script src="{{ asset('cadastro_itens/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('cadastro_itens/js/main.js') }}"></script>
