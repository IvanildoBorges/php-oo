<?php

// Importar funcoes
require_once ("Leite.php");
require_once ("Dvd.php");

$estoque = [];

for ($i = 1; $i <= 10; $i++) {
    if ($i <= 4) {
        array_push($estoque, (new Dvd($i, 2.50, "A vingança: {$i}", "201{$i}")));
    } else {
        array_push($estoque, (new Leite($i, 7.99, "Marca: muuuh 00{$i}", 5, date("Y-m-d", strtotime("-".($i-6)." days")))));
    }
}

$vencidos = [];     //array auxiliar para guardar os leites vencidos
$total = 0;     //array auxiliar para guardar a soma dos preços de todos os produtos
$dvds = [];     //array auxiliar para guardar os os dvds lançados no ano de 2012
foreach ($estoque as $proximo) {
    if ($proximo instanceof Leite) {
        if($proximo->estaVencido()){
            array_push($vencidos, $proximo);
        }
    } else if ($proximo instanceof Dvd) {
        array_push($dvds, $proximo);
    }
    $total += $proximo->getPreco();
}

//Quais leites estão vencidos?
if(!empty($vencidos)){
    echo "Leites vencidos: <br>";
    foreach ($vencidos as $proximo){
        echo "Código: {$proximo->getCodigo()}, Marca: {$proximo->getMarca()}, Vencimento: ".$proximo->getDataValidade(true)."<br>";
    }
}

//Quais os DVDs lançados em um determinado ano?
$anoLancamento = 2012;
if(!empty($dvds)){
    echo "Dvds lançados em {$anoLancamento}<br>";
    foreach ($dvds as $proximo){
        if ($proximo->getAno() == $anoLancamento) {
            echo "Codigo: {$proximo->getCodigo()}, Titulo: {$proximo->getTitulo()}, Ano de lançamento: ".$proximo->getAno()."<br>";
        }
    }
}

//Qual o valor total dos produtos contidos no estoque?
echo "Estoque total = R$: ".number_format($total, 2, ",", ".")."<br>";