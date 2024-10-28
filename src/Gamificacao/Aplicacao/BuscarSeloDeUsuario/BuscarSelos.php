<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSeloDeUsuario;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class BuscarSelos
{
    public RepositorioDeSelo $repositorioDeSelo;

    public function __construct(RepositorioDeSelo $repositorioDeSelo)
    {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }

    public function execute(BuscarSelosDto $seloDto)
    {
        $cpfAluno = new Cpf($seloDto->cpfAluno);
        $selos = $this->repositorioDeSelo->selosAlunoPorCpf($cpfAluno);
        return $selos;
    }
}