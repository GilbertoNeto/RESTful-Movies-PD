<?php

  require 'vendor/autoload.php';

  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7;
  // use GuzzleHttp\Exception\RequestException;
  use GuzzleHttp\Exception\ClientException;

  if (isset($_POST['ano']) && isset($_POST['genero'])
          && isset($_POST['estudio']) && isset($_POST['diretor']) && isset($_POST['titulo'])){

              $titulo = $_POST['titulo'];
              $diretor = $_POST['diretor'];
              $estudio = $_POST['estudio'];
              $genero = $_POST['genero'];
              $ano = $_POST['ano'];
              echo newMovie($titulo, $diretor, $estudio, $genero, $ano);
          }

  function newMovie($titulo, $diretor, $estudio, $genero, $ano){

      $client = new \GuzzleHttp\Client();

      try {
        $response = $client->request('POST', 'http://localhost:8080/MoviesRestful/webresources/movies/create',[
          'form_params' => [
              'titulo' => $titulo,
              'diretor' => $diretor,
              'estudio' => $estudio,
              'genero' => $genero,
              'ano' => $ano
          ]
      ]);

      echo $response->getBody();
      echo $response->getStatusCode();

      } catch (\Exception $e) {
        $responseError = $e->getResponse();

        echo "Status HTTP " . $responseError->getStatusCode() ."<br>";

        echo $responseError->getBody();
        // echo Psr7\str($e->getResponse());
      }

    }

 ?>
