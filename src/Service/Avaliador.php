<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Leilao;
use phpDocumentor\Reflection\Types\This;

class Avaliador
{
    //private $maiorValor; //Exibindo através da ordem Crescente
    private $maiorValor = 0; //Exibindo através da ordem Decrescente
    private $menorValor = INF; //O valor INF significa que o valor será o maior número possível

    public function avalia(Leilao $leilao): void
    {
        //Exibindo através da ordem Crescente
        //$lances = $leilao->getLances();
        //$ultimoLance = $lances[count($lances) - 1];
        //$this->maiorValor = $ultimoLance->getValor();

        //Exibindo através da ordem Decrescente
        //foreach ($leilao->getLances() as $lance) {
        //    if ($lance->getValor() > $this->maiorValor) {
        //        $this->maiorValor = $lance->getValor();
        //    }
        //}

        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }

            if ($lance->getValor() < $this->menorValor) {
                $this->menorValor = $lance->getValor();
            }
        }
    }

    /** @return mixed */
    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }

    public function getMenorValor(): float
    {
        return $this->menorValor;
    }
}
