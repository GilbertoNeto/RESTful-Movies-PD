<?php

  require 'vendor/autoload.php';

  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7;
  // use GuzzleHttp\Exception\RequestException;
  use GuzzleHttp\Exception\ClientException;


        if(isset($_GET['titulo'])){
            if($_GET['titulo'])
                echo getMovieTitle($_GET['titulo']);
        }
        if(isset($_GET['diretor'])){
            if($_GET['diretor'])
            echo getMovieDirector($_GET['diretor']);
        }
        if(isset($_GET['ano'])){
            if($_GET['ano'])
            echo getMovieAge($_GET['ano']);
        }

        if(isset($_GET['genero'])){
            if($_GET['genero'])
            echo getMovieGenre($_GET['genero']);
        }

        if(isset($_GET['id']) && isset($_GET['formato'])){
            if($_GET['id'])
            echo getMovieId($_GET['id'], $_GET['formato']);
        }

        if(isset($_GET['todos'])){
                echo getMovieTodos("Sim");
        }

        function getMovieId($id, $formato){

          $client = new \GuzzleHttp\Client();

          try {
            $response = $client->request('GET', 'http://localhost:8080/MoviesRestful/webresources/movies/listId/'.$id."?formato=".$formato);
            echo "Status HTTP: ".$response->getStatusCode();
            echo $response->getBody();
          } catch (\Exception $e) {

            $responseError = $e->getResponse();
            echo "Status HTTP: " . $responseError->getStatusCode() ."<br>";
            echo $responseError->getBody();
      }

        }


        function getMovieAge($ano){

          $client = new \GuzzleHttp\Client();

          try {
            $response = $client->request('GET', 'http://localhost:8080/MoviesRestful/webresources/movies/listLancamento/'.$ano);
            echo "Status HTTP: ".$response->getStatusCode();
            echo $response->getBody();
          } catch (\Exception $e) {

            $responseError = $e->getResponse();
            echo "Status HTTP: " . $responseError->getStatusCode() ."<br>";
            echo $responseError->getBody();
      }

        }


        function getMovieTitle($title){

          $client = new \GuzzleHttp\Client();

          try {
            $response = $client->request('GET', 'http://localhost:8080/MoviesRestful/webresources/movies/listTitulo/'.$title);
            echo "Status HTTP: ".$response->getStatusCode();
            echo $response->getBody();
          } catch (\Exception $e) {

            $responseError = $e->getResponse();
            echo "Status HTTP: " . $responseError->getStatusCode() ."<br>";
            echo $responseError->getBody();
      }

        }

        function getMovieDirector($diretor){
          $client = new \GuzzleHttp\Client();

          try {
            $response = $client->request('GET', 'http://localhost:8080/MoviesRestful/webresources/movies/listDiretor/'.$diretor);
            echo "Status HTTP: ".$response->getStatusCode();
            echo $response->getBody();
          } catch (\Exception $e) {

            $responseError = $e->getResponse();
            echo "Status HTTP: " . $responseError->getStatusCode() ."<br>";
            echo $responseError->getBody();
      }

        }

        function getMovieGenre($genre){
          $client = new \GuzzleHttp\Client();

          try {
            $response = $client->request('GET', 'http://localhost:8080/MoviesRestful/webresources/movies/listGenero/'.$genre);
            echo "Status HTTP: ".$response->getStatusCode();
            echo $response->getBody();
          } catch (\Exception $e) {

            $responseError = $e->getResponse();
            echo "Status HTTP: " . $responseError->getStatusCode() ."<br>";
            echo $responseError->getBody();
      }

        }

        function getMovieTodos($value){
            // echo var_dump($GLOBALS['client']->__getFunctions ());
            $client = new \GuzzleHttp\Client();

            try {
              $response = $client->request('GET', 'http://localhost:8080/MoviesRestful/webresources/movies/listar/'.$value);
              echo "Status HTTP: ".$response->getStatusCode();
              echo $response->getBody();
            } catch (\Exception $e) {

              $responseError = $e->getResponse();
              echo "Status HTTP " . $responseError->getStatusCode() ."<br>";
              echo $responseError->getBody();
        }
      }
        // function imprime($filme){
        //     if (isset($filme)) {
        //          foreach ($filme as $key => $value) {
        //             echo "<table>
        //                       <tr>
        //                         <th>Titulo</th>
        //                         <th>Ano Lancamento</th>
        //                         <th>Diretor</th>
        //                         <th>Genero</th>
        //                         <th>Estudio</th>
        //                       </tr>";
        //             json_encode($value);
        //             if(is_array($value)){
        //                 foreach ($value as $key => $value2) {
        //                 echo "
        //                       <tr>
        //                         <td>".$value2->titulo."</td>
        //                         <td>".$value2->anoLancamento."</td>
        //                         <td>".$value2->diretor."</td>
        //                         <td>".$value2->genero."</td>
        //                         <td>".$value2->estudio."</td>
        //                       </tr>
        //                     ";
        //                 }
        //             }else{
        //                 echo "
        //                       <tr>
        //                         <td>".$value->titulo."</td>
        //                         <td>".$value->anoLancamento."</td>
        //                         <td>".$value->diretor."</td>
        //                         <td>".$value->genero."</td>
        //                         <td>".$value->estudio."</td>
        //                       </tr>
        //                     ";
        //             }
        //             echo "</table>";
        //         }
        //     }else{
        //         echo "string";
        //     }
        // }

        ?>
