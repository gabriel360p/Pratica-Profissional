@extends('layouts.master')

@section('master-main')
    <div class="p-3">
        <div class="row justify-content-center" style="margin-top: 90px">
            <h1>Itens emprestados:</h1>
            <form action="{{ route('emprestimos.devolver', $emprestimo->id) }}" method="POST">
                @csrf
                @foreach ($emprestimo->itens as $item)
                    <input name="itens[]" value="{{ $item->id }}" type="checkbox"> {{ $item->material->nome }}
                    <br>
                    {{ $emprestimo->usuario_que_recebeu }}
                    <br>
                    {{ $emprestimo->usuario_que_emprestou }}
                    <br>
                    {{ $emprestimo->created_at }}
                    <br>
                    <br>
                    <br>
                @endforeach
                <button class="btn btn-success">Devolver</button>

            </form>
        </div>
    </div>
@endsection
