<div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">

                {{--
                    <a href="/painel">
                        <li data-filter=".filter-todos">Todos</li>
                    </a>
                    @foreach ($categorias as $categoria)
                    <a href="{{route('material.categoria',$categoria->id)}}">
                        <li data-filter=".filter-{{ $categoria->nome }}">{{ $categoria->nome }}</li>
                    </a>
                    @endforeach --}}

                <li wire:click="define({{ 0 }})" data-filter=".filter-todos">Todos</li>
                @foreach ($categorias as $categoria)
                    <li wire:click="define({{ $categoria->id }})" data-filter=".filter-{{ $categoria->nome }}">
                        {{ $categoria->nome }}</li>
                @endforeach


                <a href="/categorias/nova" class="mx-3" title="Nova Categoria">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                    </i>
                </a>

                <a href="/categorias" class="mx-3" title="Categorias">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </i>
                </a>
            </ul>
        </div>
    </div>

    <div class="row portfolio-container">
        {{-- TODO: Iterar em todas as Categorias do Material do Item --}}
        @foreach ($materiais as $material)
            <div class="col-lg-4 col-md-6">
                <a href="/emprestimos/novo">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('imagens/bbasquete.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <p>{{ $material->nome }}</p>
                            <div class="portfolio-links">
                                {{-- <a href="https://lncimg.lance.com.br/cdn-cgi/image/width=1920,quality=75,format=webp/uploads/2023/04/03/642aded4857be.jpeg"
                                data-gallery="portfolioGallery" class="portfolio-lightbox" title="Ampliar Foto"><i
                                    class="bx bx-plus"></i></a>
                            <a href="/itens/alugar" title="Alugar"><i class="bx bx-link"></i></a>
                            <a href="/itens/editar" title="Editar"><i class="bx bx-edit"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>


    {{-- Listando através dos ITENS: --}}
    {{--    <div class="col-lg-4 col-md-6">
        <div class="portfolio-wrap">
            @php
                try {
                    $path = Storage::url($item->arquivo->path);
                } catch (\Throwable $th) {
                    $path = '';
                }
            @endphp
            @if ($path)
                <img src="{{ $path }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <p>{{ $item->material->nome }}</p>
                    <div class="portfolio-links">
                  <a href="https://lncimg.lance.com.br/cdn-cgi/image/width=1920,quality=75,format=webp/uploads/2023/04/03/642aded4857be.jpeg"
                            data-gallery="portfolioGallery" class="portfolio-lightbox" title="Ampliar Foto"><i
                                class="bx bx-plus"></i></a>
                        <a href="/itens/alugar" title="Alugar"><i class="bx bx-link"></i></a>
                        <a href="/itens/editar" title="Editar"><i class="bx bx-edit"></i></a>
                    </div>
                </div>
            @else
                <div class="text-center">
                    <p>{{ $item->material->nome }}</p>
                </div>
            @endif

        </div>
    </div> --}}
