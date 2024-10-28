<?php

require_once 'vendor/autoload.php';

use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunoEmMemoria;

$cpf = $argv[1]; //recebe na linha de comando
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];


/*$dadosDto = new MatricularAlunoDto($cpf, $nome, $email);
$repositorio = new RepositorioDeAlunoEmMemoria();

$matricularAluno = new MatricularAluno($repositorio);
$matricularAluno->executa($dadosDto);*/

$repSelo = new \Alura\Arquitetura\Gamificacao\Infra\Selo\RepositorioDeSeloEmMemoria();

$publicador = new \Alura\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento();
$publicador->adicionarOuvinte(new \Alura\Arquitetura\Gamificacao\Aplicacao\GeraSeloDeNovato($repSelo));



$dadosDto = new MatricularAlunoDto($cpf, $nome, $email);
$repositorio = new RepositorioDeAlunoEmMemoria();
$useCase = new MatricularAluno($repositorio);

$useCase->executa($dadosDto);