@extends('layouts.master')
<!-- Main css -->
<link rel="stylesheet" href="{{ asset('cadastro_itens/css/style.css') }}">

@section('master-main')
    <div class="signup-content">
        <div class="signup-form mt-4">
            <h2 class="form-title">Editar de Categoria/Departamento</h2>

            <form method="POST" class="register-form "
                action="{{ route('categorias.atualizar', ['categoria' => $categoria->id]) }}">
                @csrf
                <div class="form-group">
                    <input type="text" value="{{ $categoria->nome }}" required name="nome" id="name"
                        placeholder="Nome Da Categoria" />
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
@endsection
<!-- JS -->
<script src="{{ asset('cadastro_itens/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('cadastro_itens/js/main.js') }}"></script>
