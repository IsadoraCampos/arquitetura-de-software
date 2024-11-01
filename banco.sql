CREATE TABLE alunos (
    cpf TEXT PRIMARY KEY,
    nome TEXT,
    emaiL TEXT
);

CREATE TABLE telefones (
    ddd TEXT,
    numero TEXT,
    PRIMARY KEY (ddd,numero),
    FOREIGN KEY (cpf_aluno) REFERENCES alunos(cpf)
);

CREATE TABLE indicacoes (
    cpf_indicante TEXT,
    cpf_indicado TEXT,
    data_indicacao TEXT,
    PRIMARY KEY (cpf_indicante, cpf_indicado)
);