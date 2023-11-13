<div>
    <div>
        <div class="mb-3">
            <label for="" class="form-label">Filtrar por material</label>
            <select class="form-select form-select-lg" name="" wire:model.live="material" id="">
                <option selected value="0">Todos</option>
                @foreach ($materiais as $material)
                    <option value="{{ $material->id }}">{{ $material->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <a class="btn btn-success mt-3" href="/itens/novo">Adicionar Item</a>
    </div>
    <div class="col-12">
        @if (sizeof($itens) != 0)
            <div class="table-responsive bg-white">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
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
                                    <a class="btn btn-success"
                                        href="{{ url('/itens/deletar', ['item' => $item->id]) }}"> Apagar</a>
                                    <a class="btn btn-success"
                                        href="{{ route('itens.editar', ['item' => $item->id]) }}">Editar</a>
                                </td>
                        </tr>
        @endforeach

        </tbody>
        </table>
    </div>
@else
    <div class="text-center">
        <h3>Nenhum item foi encontrado</h3>
    </div>
    @endif

</div>
</div>
