<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css"> --}}
  </head>
  <body>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/js.cookie.js"></script>
  	<script src="js/client.js"></script>
    <script src="js/settings.js"></script>
    <script>
      var suap = new SuapClient(SUAP_URL, CLIENT_ID, HOME_URI, REDIRECT_URI, SCOPE);
      suap.init();
      if (suap.isAuthenticated()) {
        // Aguarda o documento carregar para exibir o conteúdo
        $(document).ready(function () {
          // Token de autenticação do SUAP
          const suapToken = suap.getToken().getValue();
          // Token CSRF fornecido pelo Laravel
          const csrfToken = document.getElementsByName('_token')[0].value;
          
          // Envia a o token do SUAP para o callback
          $.ajax({
            url: '/authorization-callback',
            data: {
              '_token' : csrfToken,
              'suap_token' : suapToken,
            },
            type: 'POST',
            success: function(response) {
              window.location='/painel'
            },
            error: function(response) {
              alert('Falha na comunicação com o servidor');
              console.log(response);
            }
          });
        });
      } else {
        // O usuário não está autenticado
        alert('A autenticação via SUAP falhou.');
        window.location = HOME_URI;
      }
    </script>
    @csrf <!-- Necessário para evitar ataques CSRF, não remova -->
  </body>
</html>
