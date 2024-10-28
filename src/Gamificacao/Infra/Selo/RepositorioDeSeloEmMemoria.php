<?php

namespace Alura\Arquitetura\Gamificacao\Infra\Selo;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class RepositorioDeSeloEmMemoria implements RepositorioDeSelo
{

    public array $selos;

    public function adicionar(Selo $selo)
    {
        $this->selos[] = $selo;
    }

    public function selosAlunoPorCpf(Cpf $cpf) : array
    {
        return array_filter($this->selos, fn (Selo $selo) => $selo->cpf === $cpf);
    }
}