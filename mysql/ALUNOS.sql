create database Escola;
use Escola;

create table alunos (
	matricula int unsigned not null auto_increment primary key,
    CPF varchar(14) not null,
    RG varchar(9) not null,
    nome_aluno varchar(45) not null,
    data_nas date not null,
    curso varchar(45) not null,
    sexo varchar(40) not null,
    turno varchar(20) not null,
    ano varchar(20) not null
);

select * from alunos;
drop table alunos;
select *  from alunos where matricula = 1;

insert into alunos (CPF, RG, nome_aluno, data_nas, curso, sexo, turno, ano)
values ('000.000.000-00', '334455667', 'Jorge Silva', '2004/05/23', 'AGRONOMIA', 'MASCULINO', 'VESPERTINO', '3° ano');
insert into alunos (CPF, RG, nome_aluno, data_nas, curso, sexo, turno, ano)
values ('000.000.000-00', '334455667', 'Mateus do Prado', '2004/05/23', 'INFORMATICA', 'MASCULINO', 'INTEGRADO', '3° ano');
insert into alunos (CPF, RG, nome_aluno, data_nas, curso, sexo, turno, ano)
values ('000.000.000-00', '334455667', 'Bartoli Macarias', '2004/05/23', 'INFORMATICA', 'MASCULINO', 'INTEGRADO', '3° ano');
insert into alunos (CPF, RG, nome_aluno, data_nas, curso, sexo, turno, ano)
values ('000.000.000-00', '334455667', 'Jorge Marabela', '2004/05/23', 'INFORMATICA', 'MASCULINO', 'MATUTINO', '1° ano');
insert into alunos (CPF, RG, nome_aluno, data_nas, curso, sexo, turno, ano)
values ('000.000.000-00', '334455667', 'Henrrique Barraca', '2004/05/23', 'AGRONOMIA', 'MASCULINO', 'MATUTINO', '2° ano');
insert into alunos (CPF, RG, nome_aluno, data_nas, curso, sexo, turno, ano)
values ('000.000.000-00', '334455667', 'Amelia Silva', '2004/05/23', 'INFORMATICA', 'FEMENINO', 'VESPERTINO', '3° ano');