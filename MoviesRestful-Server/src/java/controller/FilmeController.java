/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import dao.DAO;
import dao.FilmeDAO;
import java.util.ArrayList;
import java.util.List;
import java.util.Objects;
import rest.Filme;

/**
 *
 * @author Gilberto Neto
 */
public class FilmeController {

    private static FilmeDAO filmeDAO = new FilmeDAO();

    public static void inicializar(){
	DAO.abrir();
    }

    public static void finalizar(){
	DAO.fechar();
    }

    public static Filme cadastrarFilme(String titulo, String diretor, String estudio,
    String genero, int anoLancamento) {

      FilmeController.inicializar();

        DAO.iniciar();

        Filme f = filmeDAO.findByTitulo(titulo);

        if (Objects.nonNull(f))
            return null;

        f = new Filme(titulo, diretor, estudio, genero, anoLancamento);

        filmeDAO.persistir(f);

        filmeDAO.efetivar();

        System.out.println("filme cadastrado com sucesso");

        return f;

    }

    public static Filme atualizarFilme(int id, String novoTitulo){

    	FilmeController.inicializar();	

        DAO.iniciar();

        Filme f = filmeDAO.findById(id);

        if (Objects.nonNull(f)){
            f.setTitulo(novoTitulo);
            filmeDAO.atualizar(f);
            filmeDAO.efetivar();

        } else
            return null;
        
        System.out.println("filme atualizado com sucesso, com o nome " + f.getTitulo());

        return f;

    }

    public static List<Filme> filmesByDiretor(String diretor){
    	
    	FilmeController.inicializar();	
    	
        List<Filme> filmes = filmeDAO.findByDiretor(diretor);

        if (Objects.isNull(filmes))
           return null;

        return filmes;
    }

    public static List<Filme> filmesByGenero(String genero){

    	FilmeController.inicializar();	
    	
        List<Filme> filmes = filmeDAO.findByGenero(genero);

        if (Objects.isNull(filmes))
           return null;

        return filmes;
    }

    public static List<Filme> filmesByAno(int anoLancamento){

    	FilmeController.inicializar();	

        List<Filme> filmes = filmeDAO.findByAno(anoLancamento);

        if (Objects.isNull(filmes))
           return null;

        return filmes;
    }

    public static Filme removerFilme(int id){

    	FilmeController.inicializar();	

       DAO.iniciar();

       Filme f = filmeDAO.findById(id);
       
       if (Objects.isNull(f))
           return null;
       
        System.out.println(f.getTitulo());

       Filme fAux = f;

       System.out.println(fAux.getTitulo() + "1");
       
       filmeDAO.apagar(f);
       DAO.efetivar();

       System.out.println(fAux.getTitulo() + "1");
       
       return fAux;
    }

    public static List<Filme> filmeByTitulo(String titulo){

    	FilmeController.inicializar();	
    	
//        Filme filme = filmeDAO.findByTitulo(titulo);
        
        List<Filme> listaFilmes = filmeDAO.listar();
        List<Filme> filmesByTitle = new ArrayList<Filme>();
//        if (Objects.isNull(filme))
//           throw new Exception("Filme não localizado");
        
        for (Filme filme : listaFilmes) {
            if (filme.getTitulo().toLowerCase().contains(titulo.toLowerCase())){
                filmesByTitle.add(filme);
            }
        }
        
        if (Objects.isNull(filmesByTitle)){
            return null;
        }
        
        return filmesByTitle;
    }
    
     public static List<Filme> AllMovies(String value){

    	FilmeController.inicializar();
        
        List<Filme> listaFilmes = new ArrayList<>();
        
        if (value.equalsIgnoreCase("Sim")){
            listaFilmes = filmeDAO.listar();
        }
        
        if (Objects.isNull(listaFilmes)){
            return null;
        }
        
        return listaFilmes;
    }
     
     
     public static Filme filmeById(int id){

    	FilmeController.inicializar();	

        Filme filme = filmeDAO.findById(id);
         
        if (Objects.isNull(filme))
           return null;

        return filme;
    }

}
