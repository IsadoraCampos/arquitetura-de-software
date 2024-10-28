<?php

namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;

use Alura\Arquitetura\Shared\Dominio\Cpf;

interface RepositorioDeSelo
{
    public function adicionar(Selo $selo);

    public function selosAlunoPorCpf(Cpf $cpf) : array;
}