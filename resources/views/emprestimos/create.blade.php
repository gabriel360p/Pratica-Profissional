@extends('layouts.master')

@section('master-main')


    <div>

        <div class="row">
            <div style="margin-top: 100px;" class="p-5">


                <form method="POST" class="register-form " action="/emprestimos/store">
                    @csrf
                    
                    <input type="text" class="form-control mb-4" readonly value="{{\App\Models\Session::first()->identificacao}}" name="usuario_que_emprestou" placeholder="Matricula de quem emprestou" required>
                    <input type="text" class="form-control mb-4"  name="usuario_que_recebeu" placeholder="Matricula de quem recebeu" required>

                    @foreach ($itens as $item)
                        <input type="checkbox" class="form-check-input" value="{{ $item->id }}" name="itens[]">
                        {{ $item->material->nome }}
                        <br>
                    @endforeach

                    <button class="btn btn-success mt-3">Emprestar</button>
                </form>




            </div>

        </div>

    </div>
@endsection
