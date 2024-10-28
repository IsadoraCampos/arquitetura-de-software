<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Aluno\Telefone;

class AdicionarTelefoneDto
{
    public string $ddd;
    public string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->ddd = $ddd;
        $this->numero = $numero;
    }
}