<?php

namespace Alura\Arquitetura\Shared\Dominio;

class Cpf
{
    private string $numero;

    public function __construct(string $numero)
    {
        $this->setNumero($numero);
    }

    private function setNumero(string $numero) : void
    {
        $opcoes = [
            'options' => [
                'regexp' => '/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'
            ]
        ];

        if (!filter_var($numero, FILTER_VALIDATE_REGEXP, $opcoes)) {
            throw new \DomainException('CPF inválido');
        }
        $this->numero = $numero;
    }

    public function __toString(): string
    {
       return $this->numero;
    }
}