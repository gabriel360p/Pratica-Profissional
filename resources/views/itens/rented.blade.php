@extends('layouts.master')

@section('master-main')
    <div class="mt-5">

        <div class="row text-center">
            <span class="h3">Histórico</span>
        </div>

        <div class="container-fluid p-2">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="table-responsive bg-white">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Foto do Item</th>
                                    <th scope="col">Item - ID</th>
                                    <th scope="col">Responsável que Emprestou</th>
                                    <th scope="col">Data de Empréstimo</th>
                                    <th scope="col">Ação</th>
                                    {{-- <th scope="col">AGE</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">SALARY</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Foto</td>
                                    <th scope="row" style="color: #666666;">Tiger Nixon</th>
                                    <td>Bola de Basquete - ID: 5</td>
                                    <td>21/05/2023</td>
                                    {{-- <td>61</td> --}}
                                    {{-- <td>Edinburgh</td>
                <td>$320,800</td> --}}
                                    <td><a href="/itens/devolver">Devolver</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
