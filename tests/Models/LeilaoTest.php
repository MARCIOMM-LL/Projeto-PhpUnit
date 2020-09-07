<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;

class LeilaoTest extends TestCase
{
    /**
     * @dataProvider geraLances
     */
    public function testLeilaoDeveReceberLances(int $qtdlances, Leilao $leilao, array $valores)
    {
        self::assertCount($qtdlances, $leilao->getLances());

        foreach ($valores as $chave => $valorEsperado) {
            self::assertEquals($valorEsperado, $leilao->getLances() [$chave]->getValor());
        }
    }

    public function geraLances()
    {
        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilaoCom2Lances = new Leilao('Mercedes');
        $leilaoCom2Lances->recebeLance(new Lance($joao, 1000));
        $leilaoCom2Lances->recebeLance(new Lance($maria, 2000));

        $leilaoCom1Lances = new Leilao('BMW');
        $leilaoCom1Lances->recebeLance(new Lance($maria, 5000));

        return [
            '2-lances' => [2, $leilaoCom2Lances, [1000, 2000]],
            '1-lance' => [1, $leilaoCom1Lances, 5000]
        ];
    }
}