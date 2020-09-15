/*criar um banco de dados chamado bd_academia */

create table academia(
   id identity(1,1) primary key,
   exercicio varchar(20) not null,
   peso int not null,
   dia varchar(20),
   repeticoes int not null
);

