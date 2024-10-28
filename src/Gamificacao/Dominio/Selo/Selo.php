<?php

namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;

use Alura\Arquitetura\Shared\Dominio\Cpf;

class Selo
{
    private Cpf $cpfAluno;
    private string $nomeSelo;

    /**
     * @param Cpf $cpfAluno
     * @param string $nomeSelo
     */
    public function __construct(Cpf $cpfAluno, string $nomeSelo)
    {
        $this->cpfAluno = $cpfAluno;
        $this->nomeSelo = $nomeSelo;
    }

    public function cpfAluno() : Cpf
    {
        return $this->cpfAluno;
    }

    public function __toString() : string {
        return $this->nomeSelo;
    }

}