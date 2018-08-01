<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
// use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;


    if (isset($_GET['id']) && isset($_GET['titulo'])){

            $id = $_GET['id'];
            $novoTitulo = $_GET['titulo'];
            echo updateMovie($id, $novoTitulo);
        }

    if(isset($_GET['todos'])){
            echo getMovieTodos("Sim");
        }


    function updateMovie($id, $novoTitulo){

        $client = new \GuzzleHttp\Client();
    try {
     $response = $client->request('PUT', 'http://localhost:8080/MoviesRestful/webresources/movies/update/'.$id.'/'.$novoTitulo);
     echo "Status HTTP: ".$response->getStatusCode();
     echo $response->getBody();
    }
    catch (\Exception $e) {
      $responseError = $e->getResponse();

      echo "Status HTTP " . $responseError->getStatusCode() ."<br>";

      echo $responseError->getBody();
    }

  }

    function getMovieTodos($value){

      $client = new \GuzzleHttp\Client();

      try {
        $response = $client->request('GET', 'http://localhost:8080/MoviesRestful/webresources/movies/listar/'.$value);
        echo "Status HTTP: ".$response->getStatusCode();
        echo "<br>";
        echo $response->getBody();
      } catch (\Exception $e) {

        $responseError = $e->getResponse();
        echo "Status HTTP " . $responseError->getStatusCode() ."<br>";
        echo $responseError->getBody();
      }


    }

    function imprime($filme){
        if (isset($filme)) {
             foreach ($filme as $key => $value) {
                echo "<table>
                          <tr>
                            <th>Titulo</th>
                            <th>Ano Lancamento</th>
                            <th>Diretor</th>
                            <th>Genero</th>
                            <th>Estudio</th>
                          </tr><br>";
                json_encode($value);
                if(is_array($value)){
                    foreach ($value as $key => $value2) {
                    echo "
                          <tr>
                            <td>".$value2->titulo."</td>
                            <td>".$value2->anoLancamento."</td>
                            <td>".$value2->diretor."</td>
                            <td>".$value2->genero."</td>
                            <td>".$value2->estudio."</td>
                          </tr>
                        ";
                    }
                }else{
                    echo "
                          <tr>
                            <td>".$value->titulo."</td>
                            <td>".$value->anoLancamento."</td>
                            <td>".$value->diretor."</td>
                            <td>".$value->genero."</td>
                            <td>".$value->estudio."</td>
                          </tr>
                        ";
                }
                echo "</table>";
            }
        }else{
            echo "string";
        }
    }

    ?>
