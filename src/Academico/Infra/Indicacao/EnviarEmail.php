<?php

namespace Alura\Arquitetura\Academico\Infra\Indicacao;

use Alura\Arquitetura\Academico\Aplicacao\Indicacao\EnviaEmailIndicacao;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

class EnviarEmail implements EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void
    {
        $assunto = 'Indicação de outro aluno';
        $msg = 'Você foi indicado por outro aluno. Parabéns!';
        mail($alunoIndicado->email(),$assunto,$msg);
    }
}