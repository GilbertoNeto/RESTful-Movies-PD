
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
      <a href="#!" class="brand-logo left">Cliente REST - Atualizar Filmes</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index">Pesquisar Filmes</a></li>
        <li><a href="remove">Remover Filme</a></li>
        <li><a href="cadastro">Cadastrar Filme</a></li>
      </ul>
    </div>
  </nav>


<br><br>

    <div class="row">
      <form class="col s12" action="" method="GET">
        <div class="input-field col s6">
          <input type="text" name="id">
          <label for="filme">ID Filme</label>
        </div>

        <div class="input-field col s6">
          <input type="text" name="titulo">
          <label for="diretor">Novo Titulo</label>
        </div>

        <div>
          <button class="btn waves-effect waves-light" type="submit" name="atualizar">Atualizar Filme</button>
        </div>
    </form>
<br>

<br>

<form class="col s12" action="" method="GET">
    <div class="row">
      <div class="input-field col s12">
          <button type="submit" name="todos" value="sim" class="btn waves-effect waves-light">Listar Filmes</button>
      </div>
    </div>
</form>

    <?php require_once('controller/atualizar_lib.php'); ?>
  </body>
</html>
