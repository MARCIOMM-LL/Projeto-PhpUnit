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
