<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;

use DomainException;

class Avaliador
{
    //private $maiorValor; //Exibindo através da ordem Crescente
    private $maiorValor = -INF; //Menor número possível
    private $menorValor = INF; //O valor INF significa que o valor será o maior número possível
    private $maioresLances;

    public function avalia(Leilao $leilao): void
    {
        //Exibindo o maior valor
        //$lances = $leilao->getLances();
        //$ultimoLance = $lances[count($lances) - 1];
        //$this->maiorValor = $ultimoLance->getValor();

        //Exibindo o menor valor
        //foreach ($leilao->getLances() as $lance) {
        //    if ($lance->getValor() > $this->maiorValor) {
        //        $this->maiorValor = $lance->getValor();
        //    }
        //}

        if ($leilao->estaFinalizado()) {
            throw new DomainException('Leilão já finalizado.');
        }

        if (empty($leilao->getLances())) {
            throw new DomainException('Não é possível avaliar leilão vazio.');
        }

        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }

            if ($lance->getValor() < $this->menorValor) {
                $this->menorValor = $lance->getValor();
            }
        }

        //Lista de lances ordenada do maior valor para o menor
        $lances = $leilao->getLances();
        usort($lances, function(Lance $lance1, Lance $lance2) {
            return $lance2->getValor() - $lance1->getValor();
        });
        $this->maioresLances = array_slice($lances, 0, 3);
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

    /**
     * @return Lance
     */
    public function getMaioresLances(): array
    {
        return $this->maioresLances;
    }
}
