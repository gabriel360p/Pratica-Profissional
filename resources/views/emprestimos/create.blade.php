@extends('layouts.master')

@section('master-main')

{{--    
    <div>
        <div class="row">
            <div style="margin-top: 100px;" class="p-5">
                <form method="POST" class="register-form " action="/emprestimos/store">
                    @csrf

                    <input type="text" class="form-control mb-4" value="{{ @old('usuario_que_recebeu') }}"
                        name="usuario_que_recebeu" required placeholder="Matricula de quem recebeu">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="badge bg-warning">{{ $error }}</span>
                            <br>
                        @endforeach
                    @endif

                    @foreach ($itens as $item)
                        <input type="checkbox" class="form-check-input" value="{{ $item->id }}" name="itens[]">
                        {{ $item->material->nome }}
                        <br>
                    @endforeach
                    <button class="btn btn-success mt-3">Emprestar</button>
                </form>
            </div>
        </div>
    </div>  --}}


    <livewire:tela-emprestimos>



@endsection
