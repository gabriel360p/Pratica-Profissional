<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('cadastro/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('cadastro/css/style.css')}}">
</head>
<body>

<div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Em frente</h2>
                        <form method="POST" class="register-form " id="register-form" action="{{url('register')}}">
                            @csrf
                            <div class="form-group">    
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" required value="{{@old('name')}}" name="name" id="name" placeholder="Seu nome"/>
                            </div>
                            @error('name')
                                <span class="badge bg-warning">{{$message}}</span>
                            @enderror

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="number" required name="matricula" value="{{@old('matricula')}}"  id="re_pass" placeholder="Sua Matrícula"/>
                            </div>
                            @error('matricula')
                                <span class="badge bg-warning">{{$message}}</span>
                            @enderror

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" required name="email" id="email" placeholder="Seu Email" value="{{@old('email')}}" />
                            </div>
                            @error('email')
                                <span class="badge bg-warning">{{$message}}</span>
                            @enderror

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" required name="password" id="pass" placeholder="Sua senha" value="{{@old('password')}}" />
                            </div>
                            @error('password')
                                <span class="badge bg-warning">{{$message}}</span>
                            @enderror

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" required name="password_confirmation" id="re_pass" placeholder="Repita sua senha" value="{{@old('password_confirmation')}}" />
                            </div>
                            @error('password_confirmation')
                                <span class="badge bg-warning">{{$message}}</span>
                            @enderror

                            <div class="form-group form-button">
                                <input type="submit" required name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('cadastro/images/')}}" alt="sing up image"></figure>
                     
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
    <script src="{{asset('cadastro/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('cadastro/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>