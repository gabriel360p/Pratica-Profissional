@extends('layouts.master')

<!-- Main css -->
<link rel="stylesheet" href="{{ asset('cadastro_itens/css/style.css') }}">


@section('master-main')
    <div class="row text-center mb-4">
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
                                @foreach ($categorias as $categoria)
                                    <td>{{ $categoria->nome }}</td>

                                    <td>
                                        <a class="btn btn-success"
                                            href="{{ url('/categorias/deletar', ['categoria' => $categoria->id]) }}">Apagar</a>
                                        <a class="btn btn-success"
                                            href="{{ route('categorias.editar', ['categoria' => $categoria->id]) }}">Editar</a>
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
<script src="{{ asset('cadastro_itens/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('cadastro_itens/js/main.js') }}"></script>
