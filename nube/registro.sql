create database registrados;
use registrados;
create table usuarios(
	id int auto_increment primary key,
	usuario varchar(30),
	clave varchar(60)
);
