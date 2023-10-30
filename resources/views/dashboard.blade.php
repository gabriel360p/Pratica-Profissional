@extends('layouts.master')

@section('master-main')
    <!-- ======= Hero Section ======= -->
    <section class="d-flex align-items-center">
        <div class="container-fluid position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">

                <div class="section-title">
                    <h2 id="portfolioname">Empréstimos</h2>
                </div>

                <div class="table-responsive">
                    <table
                        class="table table-striped
                        table-hover	
                        table-borderless
                        table-success
                        align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nome</th>
                                <th>Data de empréstimo</th>
                                <th>Quem autorizou</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr class="table-success">
                                <td scope="row">Bolad de tênis</td>
                                <td>20/10/2023</td>
                                <td>Mariana</td>
                                <td>
                                    <button class="btn btn-success">Devolver</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2 id="portfolioname">Materiais</h2>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">

                            @foreach ($categorias as $categoria)
                                <li data-filter=".filter-todos">Todos</li>
                                <li data-filter=".filter-{{ $categoria->nome }}">{{ $categoria->nome }}</li>
                            @endforeach


                            <a href="/categorias/nova" class="mx-3" title="Nova Categoria">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                    </svg>
                                </i>
                            </a>

                            <a href="/categorias" class="mx-3" title="Categorias">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
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


                @foreach ($materials as $material)
                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">
                        <div class="col-lg-4 col-md-6 portfolio-item filter-basquete">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('imagens/bbasquete.jpg') }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $material->nome }}</h4>
                                    <p>Disponivel</p>
                                    <div class="portfolio-links">
                                        <a href="https://lncimg.lance.com.br/cdn-cgi/image/width=1920,quality=75,format=webp/uploads/2023/04/03/642aded4857be.jpeg"
                                            data-gallery="portfolioGallery" class="portfolio-lightbox"
                                            title="Ampliar Foto"><i class="bx bx-plus"></i></a>
                                        <a href="/itens/alugar" title="Alugar"><i class="bx bx-link"></i></a>
                                        <a href="/itens/editar" title="Editar"><i class="bx bx-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach


            </div>

            </div>
        </section><!-- End Portfolio Section -->


    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><svg
            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-arrow-up-short" style="color:white; " viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
        </svg></a>
@endsection
