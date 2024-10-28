<?php

namespace Alura\Arquitetura\Academico\Dominio\Indicacao;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

class Indicacao
{
    private Aluno $indicante;
    private Aluno $indicado;
    private \DateTimeImmutable $data;
    public function __construct(Aluno $indicado, Aluno $indicante)
    {
        $this->indicado = $indicado;
        $this->indicante = $indicante;
        $this->data = new \DateTimeImmutable();
    }
}