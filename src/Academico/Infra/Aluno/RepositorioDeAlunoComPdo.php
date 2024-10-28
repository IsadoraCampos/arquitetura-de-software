<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class RepositorioDeAlunoComPdo implements RepositorioDeAluno
{
    private \PDO $conexao;
    public function __construct(\PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function adicionar(Aluno $aluno): void
    {
        $sql = 'INSERT INTO alunos VALUES (:cpf, :nome, :email);';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf', $aluno->cpf());
        $stmt->bindValue('nome', $aluno->nome());
        $stmt->bindValue('email', $aluno->email());
        $stmt->execute();

        $sql = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno)';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf_aluno', $aluno->cpf());

        foreach ($aluno->telefones() as $telefone) {
            $stmt->bindValue('ddd', $telefone->ddd());
            $stmt->bindValue('numero', $telefone->numero());
            $stmt->execute();
        }
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $sql = 'SELECT * FROM alunos WHERE cpf = :cpf';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf', $cpf);
        $stmt->execute();

        $aluno = $stmt->fetchObject(Aluno::class);

        if (!$aluno) {
            throw new \Exception('Aluno não encontrado');
        }

        return $aluno;
    }

    public function buscarTodos(): array
    {
        $sql = 'SELECT * FROM alunos';
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        try {
            $alunos = $stmt->fetchAll(\PDO::FETCH_CLASS, Aluno::class);
            return $alunos;
        } catch (\PDOException $e) {
            throw new \Exception("Erro ao buscar alunos".$e->getMessage());
        }

    }
}