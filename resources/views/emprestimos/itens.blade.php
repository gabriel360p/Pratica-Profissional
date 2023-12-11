@extends('layouts.master')

@section('master-main')
    <div class="p-3">
        <div class="row justify-content-center" style="margin-top: 90px">
            <h1>Itens emprestados:</h1>

            <form action="{{ route('emprestimos.devolver', $emprestimo->id) }}" method="POST">
                @csrf
                @foreach ($emprestimo->itens as $item)
                    <label for="">Itens que foram emprestados:</label>
                    <br>
                    <input name="itens[]" value="{{ $item->id }}" type="checkbox"> {{ $item->material->nome }}
                    <br>
                    <label for="">Usuário que recebeu:</label>
                    {{ $emprestimo->usuario_que_recebeu }}
                    <br>
                    <label for="">Usuário que emprestou:</label>    
                    {{ $emprestimo->usuario_que_emprestou }}
                    <br>
                    <label for="">Horário:</label>
                    {{ $emprestimo->created_at }}
                    <br>
                    <br>
                    <br>
                @endforeach
                <button class="btn btn-success">Devolver</button>
            </form>
            <form action="{{ route('emprestimos.devolver', $emprestimo->id) }}" class="mt-2" method="POST">
                @csrf
                @foreach ($emprestimo->itens as $item)
                    <input name="itens[]" value="{{ $item->id }}" hidden checked type="checkbox">
                @endforeach
                <button class="btn btn-success">Devolver todos</button>
            </form>
        </div>
    </div>
@endsection
