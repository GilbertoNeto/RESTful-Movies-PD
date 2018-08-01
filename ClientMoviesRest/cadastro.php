<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

    <title>Cliente Movie Rest Services</title>
  </head>
  <body>

    <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo left">Cliente REST - Cadastro de Filmes</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index">Pesquisar Filmes</a></li>
        <li><a href="remove">Remover Filme</a></li>
        <li><a href="atualizar">Atualizar Filme</a></li>
      </ul>
    </div>
  </nav>

<br>

      <div class="row">
        <form class="col s12" action="" method="post">
          <div class="input-field col s6">
            <input type="text" name="titulo">
            <label for="filme">Filme</label>
          </div>

          <div class="input-field col s6">
            <input type="text" name="diretor">
            <label for="diretor">Diretor</label>
          </div>

          <div class="input-field col s6">
            <input type="text" name="estudio">
            <label for="estudio">Estudio</label>
          </div>

          <div class="input-field col s6">
            <input type="text" name="genero">
            <label for="genero">Genero</label>
          </div>

          <div class="input-field col s2">
            <input type="text" name="ano">
            <label for="ano">Ano de Lançamento</label>

            <br></br>

            <div>
              <button class="btn waves-effect waves-light" type="submit" name="cadastrar">Cadastrar</button>
            </div>
          </div>

      </form>
      </div>

        <?php require_once('controller/cadastro_lib.php'); ?>

  </body>
</html>
