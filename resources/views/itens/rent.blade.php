@extends('layouts.master')

@section('master-main')
    <main id="main">
        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="{{ asset('imagens/bfutebol.jpg') }}" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="{{ asset('imagens/bfutebol.jpg') }}" alt="">

                                </div>

                                <div class="swiper-slide">
                                    <img src="{{ asset('imagens/bfutebol.jpg') }}" alt="">

                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Bola de Basquete </h3>
                            <ul>
                                <li><strong>Categorias</strong>: Basquete </li>
                                <li><strong>Quantidade Total</strong>: 5 </li>
                                <li><strong>Quantidade Disponível</strong>: 3 </li>
                                <li><strong>Estado</strong>: Bem Conservado </li>
                                <li><strong>Data de Entrada</strong>: 01 Março, 2020</li>
                                <li><strong>Local</strong>: Depósito 1</li>
                            </ul>
                            <hr>
                            <form action="/itens/alugados" method="GET">
                                @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label"> Item </label>
                                    <select class="form-select form-select-lg" name="" id="">
                                        <option>Item 1</option>
                                        <option>Item 2</option>
                                        <option>Item 3</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="div-data-emprestimo" style="display: none">
                                    <label for="" class="form-label">Data do Empréstimo</label>
                                    <input type="date" class="form-control" name="" required id=""
                                        aria-describedby="helpId" placeholder="">

                                </div>

                                <div class="mt-3 mb-3" id="div-emprestimos">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0"
                                            name="flexRadioDefault" id="agendar-emprestimo">
                                        Agendar Empréstimo

                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1"
                                            name="flexRadioDefault" id="emprestar-agora">
                                        Emprestar Agora
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center ">
                                    <button class="btn btn-success w-100">Confirmar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
    <script src="{{asset('emprestimos/data-emprestimo-show.js')}}"></script>
@endsection
