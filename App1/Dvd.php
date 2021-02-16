<?php

//classe que herda tudo que tem na classe produtos
class Dvd extends Produto {

    private $titulo;
    private $ano;
    
    public function __construct($codigo, $preco, $titulo, $ano){
        //saber se algum paramentro está sendo passado errado
        $key = array_search("", ["codigo" => $codigo,"preco" => $preco,"titulo" => $titulo, "ano" => $ano]);
        if($key){
            throw new Exception("InformaçãoNulaException: O valor {$key} está vazio");
        }

        parent::__construct($codigo, $preco);   //construtor que está na classe produto e que é herdada para classe dvd; 
        $this->titulo = $titulo;
        $this->ano = $ano;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAno() {
        return $this->ano;
    }
}