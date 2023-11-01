@extends('layouts.master')

<!-- Main css -->
<link rel="stylesheet" href="{{ asset('cadastro_itens/css/style.css') }}">
@section('master-main')
    <div class="signup-content">
        <div class="signup-form mt-4">
            <h2 class="form-title">Devolver Item</h2>
            <form method="GET" class="register-form " id="register-form" action="/inproduction">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" readonly id="name" placeholder="Nome Do Item"
                        value="" />
                    <small id="helpId" class="form-text text-muted">Nome do Item</small>
                </div>

                <div class="form-group">
                    <input type="number" required name="name" id="name" placeholder="Matrícula" value="" />
                    <small id="helpId" class="form-text text-muted">Quem devolveu</small>
                </div>

                <div class="form-group">
                    <input type="number" readonly name="name" id="name" placeholder="Matrícula" value="" />
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
@endsection
