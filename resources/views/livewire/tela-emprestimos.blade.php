<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-12 col-md-11  col-xs-12" style="margin-top: 100px">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="pb-2 ">Emprestimos de itens</h3>

                    <select wire:model.live="filtro_material" class="form-control form-control-sm" id="FormControlSelect1">
                        <option selected value="0">Todos</option>
                        @foreach ($materiais as $material)
                            <option value="{{ $material->id }}">{{ $material->nome }}</option>
                        @endforeach
                    </select>

                </div>
                <ul class="list-unstyled " id="ulitem">
                    @foreach ($itens as $item)
                        <li class="mt-2" id="boxleftmain">
                            <div class="d-flex flex-row justify-content-between align-items-center p-1">
                                <div class="d-flex flex-column p-2 justify-content-center">

                                    <h3 class="mb-0">{{ $item->material->nome }}</h3>
                                    <p class="mb-0"><span class="">Local: {{ $item->local->nome }}</span></p>
                                    <p class="mb-0"><span class="">Estado de conservação:
                                            {{ $item->estado_conservacao }}</span></p>
                                </div>

                                <div class="p-2 align-items-center justify-content-center">
                                    <button class=" btn btn-success text-center"
                                        wire:click="adicionar({{ $item }})" id="addbutton">+</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-5 col-md-11 col-sm-11 col-xs-1 " id="divpreenche" style="margin-top: 100px">
                <h3 class=" mb-3" id="">Formulário</h3>
                <!-- Conteúdo da div que tem o formulário -->
                <div class="container pb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-inline my-2 my-lg-0 col-10 " id="formpreenche">
                                <input id="formulario" required class="form-control focus mb-2 col-12"
                                    wire:model.live="responsavel" type="search"
                                    placeholder="Matrícula do aluno ou servidor" aria-label="Search">
                                <button class="btn btn-success" type="submit" wire:click="emprestar">Emprestar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="mt-5 mb-4" id="">Itens serem emprestados</h3>
                <!-- Conteúdo da div que tem o formulário -->
                <div class="container " id="divform">
                    <div class="row">
                        <div class="col-lg-12  justify-content-between" id="">
                            <div class="row">
                                @foreach ($carrinho_itens as $carrinho_item)
                                    <div wire:click="remover({{ $carrinho_item }})" class="p-1 mx-1"
                                        style="width: auto; height:auto; border: solid 1px #18b746; border-radius:11px;cursor:pointer; le">
                                        {{ $carrinho_item->material->nome }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
