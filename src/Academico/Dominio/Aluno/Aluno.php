<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Email;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class Aluno
{
    private string $nome;
    private Cpf $cpf;
    private Email $email;
    private array $telefones;

    public static function comNomeCpfEEmail(string $nome, string $cpf, string $email): self // Chamado de Named Constructors
    {
        return new Aluno($nome, new Cpf($cpf), new Email($email));
    }
    public function __construct(string $nome, Cpf $cpf, Email $email)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefones = [];
    }

    public function adicionaTelefone(string $ddd, string $telefone) : self
    {
        if (count($this->telefones) === 2) {
            throw new \DomainException('Aluno já tem 2 telefones. Não pode adicionar outro!');
        }


        $this->telefones[] = new Telefone($ddd, $telefone);
        return $this;
    }

    public function cpf() : Cpf
    {
        return $this->cpf;
    }

    public function nome() : string
    {
        return $this->nome;
    }

    public function email() : string
    {
        return $this->email;
    }

    /**@return Telefone[]*/
    public function telefones() : array
    {
        return $this->telefones;
    }


}