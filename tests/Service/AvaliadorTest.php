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

    private $leiloeiro;

    protected function setUp(): void
    {
        $this->leiloeiro = new Avaliador();
    }

    /**
     * @dataProvider  leilaoEmOrdemCrescente
     * @dataProvider  leilaoEmOrdemDecrescente
     * @dataProvider  leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveEncontrarOMaiorValorDeLances(Leilao $leilao)
    {
        $this->leiloeiro->avalia($leilao);

        $maiorValor = $this->leiloeiro->getMaiorValor();

        self::assertEquals(2500, $maiorValor);
    }

    /**
     * @dataProvider  leilaoEmOrdemCrescente
     * @dataProvider  leilaoEmOrdemDecrescente
     * @dataProvider  leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveEncontrarOMenorValorDeLances(Leilao $leilao)
    {
        //Padrões de teste Início - Act - When
        $this->leiloeiro->avalia($leilao);

        $menorValor = $this->leiloeiro->getMenorValor();

        //Método da classe TestCase
        //Esse método verifica que 2 valores são iguais
        //Verificando se valor esperado/2500 é igual a $menorValor
        //Padrões de teste: O que testar - Assert - Then
        self::assertEquals(1700, $menorValor);
    }

    /**
     * @dataProvider  leilaoEmOrdemCrescente
     * @dataProvider  leilaoEmOrdemDecrescente
     * @dataProvider  leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveBuscar3MaioresValores(Leilao $leilao)
    {
        $this->leiloeiro->avalia($leilao);

        $maiores = $this->leiloeiro->getMaioresLances();

        self::assertCount(3, $maiores);
        self::assertEquals(2500, $maiores[0]->getValor());
        self::assertEquals(2000, $maiores[1]->getValor());
        self::assertEquals(1700, $maiores[2]->getValor());
    }

    /* ---------- DADOS ---------- */
    public function leilaoEmOrdemCrescente()
    {
        $leilao = new Leilao('Mercedes');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 1700));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        return [
            'Ordem Crescente' => [$leilao]
        ];
    }

    public function leilaoEmOrdemDecrescente()
    {
        $leilao = new Leilao('Mercedes');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($ana, 1700));

        return [
            'Ordem Decrescente' => [$leilao]
        ];
    }

    public function leilaoEmOrdemAleatoria()
    {
        $leilao = new Leilao('Mercedes');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($ana, 1700));

        return [
            'Ordem Aleatória' => [$leilao]
        ];
    }

}
