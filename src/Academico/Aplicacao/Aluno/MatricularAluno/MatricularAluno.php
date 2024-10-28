<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;

class MatricularAluno
{
    private RepositorioDeAluno $repositorioDeAluno;
    private PublicadorDeEvento $publicador;
    public function __construct(RepositorioDeAluno $repositorioDeAluno)
    {
        $this->repositorioDeAluno = $repositorioDeAluno;
        $this->publicador = new PublicadorDeEvento();
        $this->publicador->adicionarOuvinte(New LogDeAlunoMatriculado());
    }

    public function executa(MatricularAlunoDto $alunoDto)
    {
        $aluno = Aluno::comNomeCpfEEmail($alunoDto->nomeAluno, $alunoDto->cpfAluno, $alunoDto->emailAluno);

        $this->repositorioDeAluno->adicionar($aluno);
        $this->publicador->publicar(new AlunoMatriculado($aluno->cpf()));
    }

}