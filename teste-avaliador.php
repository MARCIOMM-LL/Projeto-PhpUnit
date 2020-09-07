<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require_once 'vendor/autoload.php';

//Padrões de teste Início - Arrange - Given
$leilao = new Leilao('Mercedes');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();

//Padrões de teste Início - Act - When
$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

//Padrões de teste Início - Assert - Then
echo $maiorValor;

//echo "<br />";
//function comparatorFunc($x, $y)
//{
//    // If $x is equal to $y it returns 0
//    if ($x == $y) {
//        return;
//    }
//    // if x is less than y then it returns -1
//    // else it returns 1
//    if ($x < $y) {
//        return -1;
//    } else {
//        return 1;
//    }
//}
//// Input array
//$arr= array(2, 9, 1, 3, 5);
//usort($arr, "comparatorFunc");
//print_r($arr);
//usort($arr, function ($a, $b) {
//    return $a <=> $b;
//});
