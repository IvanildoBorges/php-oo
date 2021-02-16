<?php

require_once ("Produto.php");
require_once ("Perecivel.php");

//classe que herda tudo que tem na classe produtos e implementa tudo que estiver na interface Perecivel
class Leite extends Produto implements Perecivel {

    private $marca;
    private $volume;
    private $dataValidade;

    public function __construct($codigo, $preco, $marca, $volume, $dataValidade){
        $key = array_search("", ["codigo" => $codigo,"preco" => $preco,"marca" => $marca, "volume" => $volume,"data" => $dataValidade]);
        if($key){
            throw new Exception("InformaçãoNulaException: O valor {$key} está vazio");
        }
        parent::__construct($codigo, $preco);   //construtor que está na classe produto e que é herdada para classe leite; 
        $this->marca = $marca;
        $this->volume = $volume;
        $this->dataValidade = $dataValidade;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getDataValidade(bool $format):string {
        if ($format) {
            return date("d/m/Y", strtotime($this->dataValidade));
        }
        return $this->dataValidade;
    }

    public function estaVencido():bool {
        return (strtotime(date("Y-m-d")) > strtotime($this->dataValidade));
    }
}