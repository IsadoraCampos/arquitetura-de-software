<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeTelefone;
use Alura\Arquitetura\Academico\Dominio\Aluno\Telefone;

class RepositorioDeTelefoneEmMemoria implements RepositorioDeTelefone
{
    private array $telefones;
    public function adiconarTel(Telefone $telefone)
    {
        $this->telefones[] = $telefone;
    }

    public function buscarTel(Telefone $telefone): string
    {
        $telefoneFiltro = array_filter($this->telefones,
        fn (Telefone $telefone) => $telefone->getTelefone() === $telefone);

        if (count($telefoneFiltro) === 0) {
            throw new \DomainException("Telefone não encontrado");
        }
        return $telefoneFiltro[0];
    }
}