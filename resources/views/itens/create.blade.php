 @extends('layouts.master')

 <!-- Main css -->
 <link rel="stylesheet" href="{{ asset('cadastro_itens/css/style.css') }}">

 @section('master-main')
     <div class="signup-content ">
         <div class="signup-form mt-4">
             <h2 class="form-title">Cadastro de item</h2>
             <form method="post" class="register-form " id="register-form" action="{{ url('itens') }}">
                 @csrf

                 <div class="form-group">
                     <input type="text" required name="estado" placeholder="Estado do item"
                         value="{{ @old('estado') }}" />

                     @error('estado')
                         <span class="badge bg-warning">{{ $message }}</span>
                     @enderror
                 </div>


                 <div class="form-group">
                     <select class="custom-select " required id="CustomSelect" name="local_id" value="{{ @old('local') }}">

                         @foreach ($locais as $local)
                             <option value="{{ $local->id }}">{{ $local->nome }}</option>
                         @endforeach
                     </select>
                     <div id="fileHelpId" class="form-text">Escolher Lugar</div>
                     @error('local_id')
                         <span class="badge bg-warning">{{ $message }}</span>
                     @enderror
                 </div>

                 <div class="form-group">
                     <select class="custom-select " required id="CustomSelect" name="material_id">
                         @foreach ($materiais as $material)
                             <option value="{{ $material->id }}">{{ $material->nome }}</option>
                         @endforeach
                     </select>
                     <div id="fileHelpId" class="form-text">Escolher Material</div>
                     @error('material_id')
                         <span class="badge bg-warning">{{ $message }}</span>
                     @enderror
                 </div>

                 <div class="mb-3">
                     <input type="file" class="form-control" value="{{ @old('foto') }}" name="photo"
                         aria-describedby="fileHelpId">
                     <div id="fileHelpId" class="form-text">Escolher Foto</div>
                 </div>

                 <div class="form-group form-button">
                     <button class="form-submit border border-none">Salvar</button>
                 </div>
             </form>

             <button type="button" class="form-submit border border-none" data-bs-toggle="modal"
                 data-bs-target="#exampleModal">
                 Novo Local
             </button>

         </div>

         <div class="signup-image">
             {{-- <figure><img src="{{asset('cadastro_itens/images/signup-image.jpg')}}"alt="sing up image"></figure> --}}
         </div>

     </div>
     </div>

     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">

                 <div class="m-5">
                     <h2 class="form-title">Novo Local</h2>

                     <form method="POST" class="register-form " action="/locais">
                         @csrf
                         <div class="form-group">
                             <input type="text" required name="nome" id="name" placeholder="Nome Do Local"
                                 value="{{ @old('nome') }}" />
                         </div>
                         @error('nome')
                             <span class="badge bg-warning">{{ $message }}</span>
                         @enderror

                         <div class="form-group form-button">
                             <button class="form-submit border border-none">Salvar</button>
                         </div>

                     </form>
                 </div>

             </div>
         </div>
     @endsection
