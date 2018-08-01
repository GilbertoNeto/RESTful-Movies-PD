/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package rest;

import controller.FilmeController;
import java.util.List;
import java.util.Objects;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.POST;
import javax.ws.rs.DELETE;
import javax.ws.rs.FormParam;
import javax.ws.rs.PathParam;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.GenericEntity;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.Response.Status;

/**
 * REST Web Service
 *
 * @author Gilberto Neto
 */
@Path("movies")
@Produces({MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML, MediaType.TEXT_HTML})
public class MoviesResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of MoviesResource
     */
    public MoviesResource() {
    }

    
    @POST
    @Path("create")
    @Produces({MediaType.TEXT_XML,MediaType.APPLICATION_JSON})
    public Response createMovie(@FormParam("titulo") String titulo, @FormParam("diretor") String diretor,
            @FormParam("estudio") String estudio, @FormParam("genero") String genero,
            @FormParam("ano") String anoLancamento){
        
        Filme movie = new Filme();
        
        int dataLanc = Integer.parseInt(anoLancamento);
        
   
          Filme response =  FilmeController.cadastrarFilme(titulo, diretor, estudio, genero, dataLanc);
          
          if (Objects.isNull(response))
              return Response.status(Status.CONFLICT).entity("Filme já cadastrado").build();  
          
        movie.setAnoLancamento(dataLanc);
        movie.setDiretor(diretor); 
        movie.setEstudio(estudio);
        movie.setGenero(genero);
        movie.setTitulo(titulo);
        
        return Response.ok(movie, MediaType.APPLICATION_JSON).build();
    }
    
    
    
    @PUT
    @Path("update/{id}/{titulo}")
    @Produces(MediaType.APPLICATION_JSON)
    public Response updateMovie(@PathParam("id") int id, @PathParam("titulo") String titulo){
        
        Filme movieUpdated = FilmeController.atualizarFilme(id, titulo);
        
        if (Objects.isNull(movieUpdated)){
            String msg = "Filme não encontrado";
            return Response.status(Status.NOT_FOUND).entity(msg).build();  
        }
        
        return Response.ok(movieUpdated, MediaType.APPLICATION_JSON).build();
        
    }
    
    @GET
    @Path("listar/{value}")
    @Produces(MediaType.APPLICATION_JSON)
    public Response listAllMovies(@PathParam("value") String value){
        
        List<Filme> filmes = FilmeController.AllMovies(value);
        
        if (filmes.isEmpty())
            return Response.status(Status.NOT_FOUND).entity("Não existem filmes cadastrados").build();
        
        return Response.ok(filmes, MediaType.APPLICATION_JSON).build();
        
    }
    
    
    @DELETE
    @Path("remover/{id}")
    @Produces(MediaType.APPLICATION_XML)
    public Response removeMovie(@PathParam("id") int id){
        
        
        Filme movieDeleted = FilmeController.removerFilme(id);
        
        if (Objects.isNull(movieDeleted)){
            return Response.status(Status.NOT_FOUND).entity("Não existe filme com o ID Informado").build();
        }
        
        //Pode ser utilizado para evitar erros com media types
         GenericEntity<Filme> movieReturn = new GenericEntity<Filme>(movieDeleted) {};
    
//        return Response.ok(movieReturn, MediaType.APPLICATION_XML).build();
         return Response.ok(movieDeleted, MediaType.APPLICATION_XML).build();
    }
    
    
    @GET
    @Path("listId/{id}")
    @Produces({MediaType.APPLICATION_JSON, MediaType.TEXT_XML})
    public Response findMovieById(@PathParam("id") int id, @QueryParam("formato") String formato){
        
        Filme filmeRetorno = FilmeController.filmeById(id);
        
        if (Objects.isNull(filmeRetorno))
             return Response.status(Status.NOT_FOUND).entity("Não existe filme com o ID Informado").build();
        
         if (formato.equalsIgnoreCase("json"))
            return Response.ok(filmeRetorno, MediaType.APPLICATION_JSON).build();
         
         
        if (formato.equalsIgnoreCase("xml")){
          
          //Pode ser utilizado para evitar erros com media types   
         GenericEntity<Filme> genericEntity = new GenericEntity<Filme>(filmeRetorno){};
         
//         return Response.status(Status.OK).entity(genericEntity).type(MediaType.TEXT_XML).build();
        
         return Response.ok(filmeRetorno, MediaType.TEXT_XML).build();
        }
        
        return null;
    }
    
    @GET
    @Path("listTitulo/{titulo}")
    @Produces(MediaType.TEXT_HTML)
    public Response findMovieByTitulo(@PathParam("titulo") String titulo){
        
        List<Filme> filmesRetorno = FilmeController.filmeByTitulo(titulo);
        
        if (filmesRetorno.isEmpty())
             return Response.status(Status.NOT_FOUND).entity("Não existem filmes com o Titulo Informado").build();
        
        String result = "<table><tr><th>Titulo</th>\n" +
"                                <th>Ano Lancamento</th>\n" +
"                                <th>Diretor</th>\n" +
"                                <th>Genero</th>\n" +
"                                <th>Estudio</th>"+
                                 "</tr>\n";
  
        for(Filme filme:filmesRetorno){
            result += "<tr>";
            result += "<td>" + filme.getTitulo()+"</td>";
            result += "<td>" + filme.getAnoLancamento()+"</td>";
            result += "<td>" + filme.getDiretor()+"</td>";
            result += "<td>" + filme.getGenero()+"</td>";
            result += "<td>" + filme.getEstudio()+"</td>";
            result += "</tr>";
        }
        
        result += "</table>";
        
        return Response.status(200).entity("<html> " + "<title>" + "Lista de Filmes" + "</title><body><b>"+result+"</b></body></html>").build();
        
//           return Response.ok(filmesRetorno, MediaType.TEXT_HTML).build();
      
    }
    
    
    @GET
    @Path("listDiretor/{diretor}")
    @Produces(MediaType.TEXT_HTML)
    public Response findMovieByDiretor(@PathParam("diretor") String diretor){
        
        List<Filme> filmesRetorno = FilmeController.filmesByDiretor(diretor);
        
        if (filmesRetorno.isEmpty())
             return Response.status(Status.NOT_FOUND).entity("Não existem filmes cadastrados com o diretor Informado").build();
       
  
        String result = "<table><tr><th>Titulo</th>\n" +
"                                <th>Ano Lancamento</th>\n" +
"                                <th>Diretor</th>\n" +
"                                <th>Genero</th>\n" +
"                                <th>Estudio</th>"+
                                 "</tr>\n";
  
        for(Filme filme:filmesRetorno){
            result += "<tr>";
            result += "<td>" + filme.getTitulo()+"</td>";
            result += "<td>" + filme.getAnoLancamento()+"</td>";
            result += "<td>" + filme.getDiretor()+"</td>";
            result += "<td>" + filme.getGenero()+"</td>";
            result += "<td>" + filme.getEstudio()+"</td>";
            result += "</tr>";
        }
        
        result += "</table>";
        

        return Response.status(200).entity("<html> " + "<title>" + "Lista de Filmes" + "</title><body><b>"+result+"</b></body></html>").build();
 
//         GenericEntity<List<Filme>> genericEntity = new GenericEntity<List<Filme>>(filmesRetorno){};
        
//       return Response.status(Status.OK).entity(genericEntity).type(MediaType.TEXT_HTML).build();
    }
    
    
    @GET
    @Path("listGenero/{genero}")
    @Produces(MediaType.TEXT_HTML)
    public Response findMovieByGenero(@PathParam("genero") String genero){
        
        List<Filme> filmesRetorno = FilmeController.filmesByGenero(genero);
        
        if (filmesRetorno.isEmpty())
             return Response.status(Status.NOT_FOUND).entity("Não existem filmes com o genero Informado").build();
       
         String result = "<table><tr><th>Titulo</th>\n" +
"                                <th>Ano Lancamento</th>\n" +
"                                <th>Diretor</th>\n" +
"                                <th>Genero</th>\n" +
"                                <th>Estudio</th>"+
                                 "</tr>\n";
  
        for(Filme filme:filmesRetorno){
            result += "<tr>";
            result += "<td>" + filme.getTitulo()+"</td>";
            result += "<td>" + filme.getAnoLancamento()+"</td>";
            result += "<td>" + filme.getDiretor()+"</td>";
            result += "<td>" + filme.getGenero()+"</td>";
            result += "<td>" + filme.getEstudio()+"</td>";
            result += "</tr>";
        }
        
        result += "</table>";
        
        return Response.status(200).entity("<html> " + "<title>" + "Lista de Filmes" + "</title><body><b>"+result+"</b></body></html>").build();
        
//        return Response.ok(filmesRetorno, MediaType.TEXT_HTML).build();
    }
    
    
    @GET
    @Path("listLancamento/{ano}")
    @Produces(MediaType.TEXT_HTML)
    public Response findMovieByAno(@PathParam("ano") int ano){
        
        List<Filme> filmesRetorno = FilmeController.filmesByAno(ano);
        
        if (filmesRetorno.isEmpty())
             return Response.status(Status.NOT_FOUND).entity("Não existem filmes com o genero Informado").build();
       
         String result = "<table><tr><th>Titulo</th>\n" +
"                                <th>Ano Lancamento</th>\n" +
"                                <th>Diretor</th>\n" +
"                                <th>Genero</th>\n" +
"                                <th>Estudio</th>"+
                                 "</tr>\n";
  
        for(Filme filme:filmesRetorno){
            result += "<tr>";
            result += "<td>" + filme.getTitulo()+"</td>";
            result += "<td>" + filme.getAnoLancamento()+"</td>";
            result += "<td>" + filme.getDiretor()+"</td>";
            result += "<td>" + filme.getGenero()+"</td>";
            result += "<td>" + filme.getEstudio()+"</td>";
            result += "</tr>";
        }
        
        result += "</table>";
        

        return Response.status(200).entity("<html> " + "<title>" + "Lista de Filmes" + "</title><body><b>"+result+"</b></body></html>").build();
        
//        return Response.ok(filmesRetorno, MediaType.TEXT_HTML).build();
    }  
    
}
