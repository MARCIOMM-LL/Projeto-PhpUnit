<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

//A classe test por uma questão de boas práticas,
//sempre deve iniciar com o nome da classe que se
//pretende testar e a palavra test em inglês logo
//em seguida
class AvaliadorTest extends TestCase
{
    //Para o phpUnit reconhecer que esse método é um
    //teste, a primeira palavra do método precisa
    //iniciar com palavra test em inglês e em seguida
    //o nome precisa ser bastante descritivo sobre o
    //que o método irá fazer
    public function testAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemCrescente()
    {
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

        //Método da classe TestCase
        //Esse método verifica que 2 valores são iguais
        //Verificando se valor esperado/2500 é igual a $maiorValor
        self::assertEquals(2500, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemDecrescente()
    {
        //Padrões de teste Início - Arrange - Given
        $leilao = new Leilao('Mercedes');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro = new Avaliador();

        //Padrões de teste Início - Act - When
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        //Padrões de teste Início - Assert - Then
        echo $maiorValor;

        //Método da classe TestCase
        //Esse método verifica que 2 valores são iguais
        //Verificando se valor esperado/2500 é igual a $maiorValor
        self::assertEquals(2500, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarOMenorValorDeLancesEmOrdemDecrescente()
    {
        //Padrões de teste Início - Arrange - Given
        $leilao = new Leilao('Mercedes');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro = new Avaliador();

        //Padrões de teste Início - Act - When
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        //Padrões de teste Início - Assert - Then
        echo $menorValor;

        //Método da classe TestCase
        //Esse método verifica que 2 valores são iguais
        //Verificando se valor esperado/2500 é igual a $maiorValor
        self::assertEquals(2000, $menorValor);
    }

    public function testAvaliadorDeveEncontrarOMenorValorDeLancesEmOrdemCrescente()
    {
        //Padrões de teste Início - Arrange - Given
        $leilao = new Leilao('Mercedes');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        $leiloeiro = new Avaliador();

        //Padrões de teste Início - Act - When
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        //Padrões de teste Início - Assert - Then
        echo $menorValor;

        //Método da classe TestCase
        //Esse método verifica que 2 valores são iguais
        //Verificando se valor esperado/2500 é igual a $maiorValor
        self::assertEquals(2000, $menorValor);
    }
}
