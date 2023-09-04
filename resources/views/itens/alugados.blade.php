@extends('layouts.master')

@section('master-main')


<div class="mt-5">
    
    <div class="row">
        <span class="h3">Itens em uso</span>
    </div>
    
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Horário</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td >Bola de Basquete</td>
                    <td>1</td>
                    <td>Responsável 1</td>
                    <td>04/09/2023 - 7:00 </td>

                </tr>

                <tr class="">
                    <td >Bola de Futebol</td>
                    <td>1</td>
                    <td>Responsável 2</td>
                    <td>04/09/2023 - 8:00 </td>

                </tr>


                <tr class="">
                    <td >Bola de Voleibol</td>
                    <td>1</td>
                    <td>Responsável 3</td>
                    <td>04/09/2023 - 8:40 </td>

                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection