<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

class Telefone
{
    private string $ddd;
    private string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->setDdd($ddd);
        $this->setNumero($numero);
    }

    private function setDdd(string $ddd) : void
    {
        $opcoes = [
            'options' => [
                'regexp' => '/^\d{2}$/'
            ]
        ];

        if (!filter_var($ddd, FILTER_VALIDATE_REGEXP,$opcoes)) {
            throw new \DomainException('Número de DDD inválido');
        }
        $this->ddd = $ddd;
    }

    private function setNumero(string $numero) : void
    {
        $opcoes = [
            'options' => [
                'regexp' => '/^\d{4}\-\d{4}$/'
            ]
        ];

        if (!filter_var($numero, FILTER_VALIDATE_REGEXP,$opcoes)) {
            throw new \DomainException('Número de telefone inválido');
        }
        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->numero}";
    }

    public function ddd() : string
    {
        return $this->ddd;
    }

    public function numero() : string
    {
        return $this->numero;
    }

    /**
     * @return string
     */
    public function getTelefone(): string
    {
        $telefone = "({$this->ddd}) - {$this->numero}";
        return $telefone;
    }
}