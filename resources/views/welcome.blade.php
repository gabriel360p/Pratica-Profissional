<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
</style>

<body onload="auth()">

    {{-- <div class="container" id="container-after-login" style="margin-top: 30px;">
    <span class="display-5" id="welcome-user"></span>

    <div class="mt-3">
      <h5 id="login-status-h5"></h5>
    </div>
    <hr>

    <div class="row">
      <div class="col-12">
        <button id="deslogar" class="btn btn-outline-success">Deslogar</button>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h3 class="mb-3 mt-2">Atente-se aos seus dados:</h3>
        <img src="" id="user-avatar">
        <div id="user-data-div">
          
        </div>
      </div>
    </div>
    

  </div> --}}

    <div class="container" id="container-login" style="margin-top: 100px;">

        <div id="logar" class="row">
            <div class="col-12">
                <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">

                    <div>
                        <img src="https://www.ifpb.edu.br/ti/sistemas/imagens/suap.jpg" style="height: 100px;"
                            alt="">
                    </div>

                    <div class="mt-3">
                        <h5 id="login-status-h5"></h5>
                    </div>

                    <div style="width: 10%;" class="mt-3">
                        <a id="login" class="btn btn-outline-success">Logar com SUAP</a>
                    </div>

                </div>

            </div>
        </div>

    </div>


    <script src="{{ asset('suap/js.cookie.js') }}"></script>
    <script src="{{ asset('suap/settings.js') }}"></script>
    <script src="{{ asset('suap/client.js') }}"></script>
    <script>
        //inciando objeto SUAP
        var suap = new SuapClient(SUAP_URL, CLIENT_ID, REDIRECT_URI, SCOPE);
        suap.init();

        //captura do evento ao clicar em login
        document.querySelector('a#login').addEventListener('click', logar)

        //captura do evento ao clicar em deslogar
        // document.querySelector('button#deslogar').addEventListener('click', deslogar)

        //captura do evento ao clicar em deslogar
        // document.querySelector('button#logar').href = suap.getLoginURL()

        async function auth() { //essa função verifica como está o usuário, se ele está autenticado ou não
            if (suap.isAuthenticated()) {
                await meusDados()
                console.log("Vc esta logado")
            } 
        }

        function meusDados() { //pegando os dados do usuário, daqui posso até mandar para um banco de dados
            if (suap.isAuthenticated()) {

                //definindo os scopos
                var scope = "identificacao email documentos_pessoais"
                var callback = function(response) {

                    //recuperando os dados
                    let dados = response.data

                    //mandando os dados para os servidor
                    axios({
                        method: 'post',
                        url: 'http://localhost:8000/data/user',
                        data: {
                            nome_usual:dados.nome_usual,
                            identificacao:dados.identificacao,
                            campus:dados.campus,
                            email:dados.email,
                            sexo:dados.sexo,
                            cpf:dados.cpf,
                            foto:dados.foto,
                            data_de_nascimento:dados.data_de_nascimento,
                            email_academico:dados.email_academico,
                            email_google_classroom:dados.email_google_classroom,
                            email_preferencial:dados.email_preferencial,
                            email_secundario:dados.email_secundario,
                            nome:dados.nome,
                            nome_registro:dados.nome_registro,
                            nome_social:dados.nome_social,
                            primeiro_nome:dados.primeiro_nome,
                            tipo_usuario:dados.tipo_usuario,
                            ultimo_nome:dados.ultimo_nome,
                        }
                    }).then(res => {
                        console.log(res)

                        //essa é uma parte importante!
                        //após os dados terem sido enviado COM SUCESSO para o back-end, o sistema faz o redirecionamento para página dashboard/painel
                        window.location.href = "http://localhost:8000/painel";
                    }).catch(err => {
                        console.log(err)
                    })
                    
                };
                suap.getResource(scope, callback)
            }
        }

        // function deslogar() { //logout do usuário
        //     suap.logout();
        // }

        function logar() { //encaminhamento para logar o usuário caso ele não esteja logado no suap
            let a = document.querySelector('a#login')
            a.setAttribute('href', suap.getLoginURL())
        }
    </script>
</body>

</html>
