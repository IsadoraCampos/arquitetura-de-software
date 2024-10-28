<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class RepositorioDeAlunoEmMemoria implements RepositorioDeAluno
{
    private array $alunos = [];


    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
      $alunosFiltro = array_filter($this->alunos, fn (Aluno $aluno) => $aluno->cpf() == $cpf);

      if (count($alunosFiltro) === 0) {
          throw new \Exception('Aluno não encontrado');
      }

      return $alunosFiltro[0];
    }

    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}