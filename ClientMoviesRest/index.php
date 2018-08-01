<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
          <!-- Compiled and minified JavaScript -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

          <title>Cliente Movie Rest Services</title>
        </head>
    <body>
      <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo left">Cliente REST - Pesquisar Filmes</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="cadastro">Cadastrar Filmes</a></li>
          <li><a href="remove">Remover Filme</a></li>
          <li><a href="atualizar">Atualizar Filme</a></li>
        </ul>
      </div>
      </nav>

        <div class="row">
          <form action="" action="" method="get" class="input-field col s6">
            <input type="text" name="titulo">
            <label for="filme">Title Search</label>
            <button class="btn waves-effect waves-light" type="submit" name="title">Pesquisar</button>
          </form>
          <br>
        </div>

        <div class="row">
          <form action="" action="" method="get" class="input-field col s6">
            <input type="text" name="diretor">
            <label for="filme">Director Search</label>
            <button class="btn waves-effect waves-light" type="submit" name="director">Pesquisar</button>
          </form>
          <br>
        </div>
        <br>

        <div class="row">
          <form action="" action="" method="get" class="input-field col s6">
            <input type="text" name="genero">
            <label for="filme">Genre Search</label>
              <button class="btn waves-effect waves-light" type="submit" name="genre">Pesquisar</button>
          </form>
          <br>
        </div>
        <br>

        <div class="row">
          <form action="" action="" method="get" class="input-field col s6">
            <input type="text" name="ano">
            <label for="filme">Year Search</label>
              <button class="btn waves-effect waves-light" type="submit" name="year">Pesquisar</button>
          </form>
          <br>
        </div>
        <br>

        <div class="row">
          <form action="" action="" method="get" class="input-field col s6">
            <input type="text" name="id">
            <label for="filme">Id Search + Formato</label>
            <br>
            <input type="text" name="formato">
            <!-- <label for="formato">Return Format</label>  -->
            <button class="btn waves-effect waves-light" type="submit" name="identifier">Pesquisar</button>
          </form>
        </div>
        <br>


        <form class="row" action="" method="GET">
            <div class="row">
              <div class="input-field col s12">
                  <button type="submit" name="todos" value="sim" class="btn waves-effect waves-light">Listar Filmes</button>
              </div>
            </div>
        </form>

        <br>

          <?php require_once('controller/index_lib.php'); ?>

    </body>
</html>
