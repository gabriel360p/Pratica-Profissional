@extends('layouts.master')

<!-- Main css -->
<link rel="stylesheet" href="{{ asset('cadastro_itens/css/style.css') }}">

@section('master-main')
    <div class="signup-content ">
        <div class="signup-form mt-4">
            <h2 class="form-title">Cadastro de item</h2>
            <form method="post" class="register-form " id="register-form" action="{{ route('itens.update', $item->id) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="text" required name="estado_conservacao" placeholder="Estado do item"
                        value="{{ $item->estado_conservacao }}" />
                </div>


                <div class="form-group">
                    <select class="custom-select " required id="CustomSelect" name="local_id" value="{{ @old('local') }}">
                        <option selected value="{{ $item->local->id }}">{{ $item->local->nome }}</option>
                        @foreach ($locais as $local)
                            <option value="{{ $local->id }}">{{ $local->nome }}</option>
                        @endforeach
                    </select>
                    <div id="fileHelpId" class="form-text">Escolher Lugar</div>
                </div>

                <div class="form-group">
                    <select class="custom-select " required id="CustomSelect" name="material_id">
                        <option selected value="{{ $item->material->id }}">{{ $item->material->nome }}</option>
                        @foreach ($materiais as $material)
                            <option value="{{ $material->id }}">{{ $material->nome }}</option>
                        @endforeach
                    </select>
                    <div id="fileHelpId" class="form-text">Escolher Material</div>
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control" value="{{ @old('foto') }}" name="foto"
                        aria-describedby="fileHelpId">
                    <div id="fileHelpId" class="form-text">Escolher Foto</div>
                    @error('foto')
                        <span class="badge bg-warning">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-button">
                    <button class="form-submit border border-none">Salvar</button>
                </div>
            </form>

            <button type="button" class="form-submit border border-none" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Novo Local
            </button>

        </div>

        <div class="signup-image">

            @php
                try {
                    $path = Storage::url($item->arquivo->path);
                } catch (\Throwable $th) {
                    $path = '';
                }
            @endphp

            <div class="text-center">
                <h2>Foto do item:</h2>
            </div>
            <figure><img src="{{ $path }}"alt="Foto do item"></figure>
        </div>

    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="m-5">
                    <h2 class="form-title">Nova Categoria</h2>

                    <form method="POST" class="register-form " action="/locais">
                        @csrf
                        <div class="form-group">
                            <input type="text" required name="nome" id="name" placeholder="Nome Do Local"
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
    @endsection
