@extends('layouts.master')

@section('master-main')
    <div class="p-3">
        <div class="row justify-content-center" style="margin-top: 90px">
            {{-- <livewire:buscar-itens> --}}

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Data e Hora</th>
                            <th scope="col">Quem Emprestou</th>
                            <th scope="col">Quem Recebeu</th>
                            <th scope="col">Item(s)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emprestimos as $emp)
                        <tr class="">
                                <td>
                                    {{ $emp->created_at }}
                                </td>

                                <td>
                                    {{ $emp->usuario_que_emprestou }}
                                </td>

                                <td>
                                    {{ $emp->usuario_que_recebeu }}
                                </td>

                                <td>
                                    {{-- acessando os items desse empréstimo --}}
                                    @foreach ($emp->itens as $item)
                                        {{ $item->material->nome }};
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>



        </div>
    </div>
@endsection
