<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Aluno\Telefone;

use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeTelefone;
use Alura\Arquitetura\Academico\Dominio\Aluno\Telefone;

class AdicionarTelefone
{
    public RepositorioDeTelefone $repTelefone;

    public function __construct(RepositorioDeTelefone $repTelefone) {
        $this->repTelefone = $repTelefone;
    }

    public function executa(AdicionarTelefoneDto $telefoneDto)
    {
        $telefone = new Telefone($telefoneDto->ddd, $telefoneDto->numero);

        $this->repTelefone->adiconarTel($telefone);
    }
}