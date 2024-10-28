<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Shared\Dominio\Evento\Evento;
use Alura\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;

class GeraSeloDeNovato extends OuvinteDeEvento
{
    private RepositorioDeSelo $repositorioSelo;
    public function __construct(RepositorioDeSelo $repositorioSelo)
    {
        $this->repositorioSelo = $repositorioSelo;
    }

    public function sabeProcessar(Evento $evento): bool
    {
       return get_class($evento) === 'Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado';
    }

    public function reageAo(Evento $evento): void
    {
        $array = $evento->jsonSerialize();
        $cpf = $array['cpfAluno'];

        $selo = new Selo($cpf, 'Novato');
        $this->repositorioSelo->adicionar($selo);
    }
}