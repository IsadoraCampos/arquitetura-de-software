<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSeloDeUsuario;

use Alura\Arquitetura\Shared\Dominio\Cpf;

class BuscarSelosDto
{
    public string $cpfAluno;

    public function __construct(string $cpfAluno)
    {
        $this->cpfAluno = $cpfAluno;
    }

}