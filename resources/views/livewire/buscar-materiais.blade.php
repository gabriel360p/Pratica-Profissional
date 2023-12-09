<div>
    <div>
        <input type="text" placeholder="Buscar Material" class="form-control" name="categoria" wire:model.live="material">
    </div>

    <div>
        <a class="btn btn-success mt-3" href="/materiais/novo">Adicionar Material</a>
    </div>
    <div class="col-12">
        @if (sizeof($materiais) != 0)
            <div class="table-responsive bg-white">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Material</th>
                            <th scope="col">Categorias</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @foreach ($materiais as $material)
                                <td>{{ $material->nome }}</td>
                                <td>
                                    @foreach ($material->categorias as $categoria)
                                        {{ $categoria->nome }};
                                    @endforeach
                                </td>

                                <td>
                                    <a class="btn btn-success"
                                        href="{{ url('/materiais/deletar', ['material' => $material->id]) }}">Apagar</a>
                                    <a class="btn btn-success"
                                        href="{{ route('materiais.editar', $material->id) }}">Editar</a>

                                </td>
                        </tr>
        @endforeach

        </tbody>
        </table>
    </div>
@else
    <div class="text-center">
        <h3>Nenhum material foi encontrado</h3>
    </div>
    @endif

</div>
</div>
