<?php

//classe abstrata que não pode ser instanciada como objeto
abstract class Produto{
    protected $codigo;
    protected $preco;

    public function __construct($codigo, $preco){
        $this->codigo = $codigo;
        $this->preco = $preco;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getPreco() {
        return $this->preco;
    }
}