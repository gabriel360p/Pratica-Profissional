@extends('layouts.master')

@section('master-main')
<div class="p-3">
    <div class="row justify-content-center" style="margin-top: 90px">

        <div>
            <a href="/categorias/nova" class="btn btn-success mb-4">Adicionar Categoria</a>
        </div>

            <div class="col-12">
                @if (sizeof($categorias) != 0)
                    <div class="table-responsive bg-white">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Local</th>
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
        @else
            <div class="text-center">
                <h3>Nenhuma categoria foi cadastrada</h3>
            </div>
            @endif

        </div>
    </div>
    </div>
@endsection
