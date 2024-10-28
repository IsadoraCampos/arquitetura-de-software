<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;
//Se eu tenho algo que sei que existem regras, mas não sei como são aplicadas, isso é chamado de Interface
use Alura\Arquitetura\Shared\Dominio\Cpf;

interface RepositorioDeAluno
{ //Não importa se vou usar PDO, uma API ou qualquer outra coisa, mas qualquer coisa que for implementar vai ter que fazer essas funções determinadas
    public function adicionar(Aluno $aluno) : void;
    public function buscarPorCpf(Cpf $cpf) : Aluno;
    /**@return Aluno[]*/
    public function buscarTodos() : array;
}