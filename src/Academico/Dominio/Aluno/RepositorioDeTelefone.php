<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

interface RepositorioDeTelefone
{
    public function adiconarTel(Telefone $telefone);

    public function buscarTel(Telefone $telefone) : string;
}