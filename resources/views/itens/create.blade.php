<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Item</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('cadastro_itens/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('cadastro_itens/css/style.css')}}">
</head>
<body>

<div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Cadastro de item</h2>
                        <form method="POST" class="register-form " id="register-form" action="/inproduction">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" required name="name" id="name" placeholder="Nome Do Item" value="Bola de Voleibol"/>
                            </div>

                             <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" required name="name" id="name" placeholder="Quantidade" value="3"/>
                            </div>

                            <div class="form-group">
                                
                                <select class="custom-select " required id="CustomSelect">
                                    <option selected>Categorias</option>
                                    <option value="1" >Futebol</option>
                                    <option value="2" selected>Voleibol</option>
                                    <option value="3">Basquete</option>
                                  </select><label for="email"><i class="zmdi zmdi-email"></i></label>
                    
                            </div>
                            <div class="form-group">

                             
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <select class="custom-select "  required id="CustomSelect">   
                                <option selected>Local de armazenamento</option>
                                <option value="1" selected >Depósito 1</option>
                                <option value="1" >Depósito 2</option>
                                <option value="1" >Depósito 3</option>
                              </select>
                            
                            </div>

                          
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />

                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Cadastrar"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('cadastro_itens/images/signup-image.jpg')}}"alt="sing up image"></figure>
                     
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('cadastro_itens/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('cadastro_itens/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>