@extends('layouts.master')

@section('master-main')
    <div class="p-3">
        <div class="row justify-content-center" style="margin-top: 90px">
            <div>
                <a class="btn btn-success mt-3" href="/itens/novo">Adicionar Item</a>
            </div>
            <div class="col-12">
                @if (sizeof($itens) != 0)
                    <div class="table-responsive bg-white">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Item/Material</th>
                                    <th scope="col">Local</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($itens as $item)
                                        <td>{{ $item->material->nome }}</td>
                                        <td>{{ $item->local->nome }}</td>
                                        <td>{{ $item->estado }}</td>

                                        <td>
                                            <button class="btn btn-success"
                                                href="{{ url('/itens/deletar', ['item' => $item->id]) }}" > Apagar</button>
                                            <button class="btn btn-success"
                                                href="{{ route('itens.editar', ['item' => $item->id]) }}" >Editar</button>
                                        </td>
                                </tr>
                @endforeach

                </tbody>
                </table>
            </div>
        @else
            <div class="text-center">
                <h3>Nenhum item foi cadastrado</h3>
            </div>
            @endif

        </div>
    </div>
    </div>
@endsection
