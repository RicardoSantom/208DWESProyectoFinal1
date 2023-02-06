/**
*@author Ricardo Santiago Tomé - RicardoSantom en Github <https://github.com/RicardoSantom>
*@since noviembre 2022
*@version 1.0
*@description Este archivo es un script sql que crea una base de datos, la pone en uso,
* crea dos tablas dentro de ella. Crea un usuario con todos los privilegios sobre esta DB.
*/
/*Creación base de datos*/
create database if not exists DB208DWESLoginLogoff;
/*Puesta en uso de la base de datos*/
use DB208DWESLoginLogoff;
/*Cración tabla T02_Departamento*/
create table if not exists T02_Departamento(T02_CodDepartamento char(3) primary key,
    T02_DescDepartamento varchar(255) not null, T02_FechaCreacionDepartamento datetime not null,
    T02_VolumenNegocio float not null,T02_FechaBajaDepartamento datetime null)
    engine=Innodb;
/*Creación de la tabla T01_Usuario.*/
create table if not exists T01_Usuario(
    T01_CodUsuario varchar(10) primary key not null,
    T01_Password varchar(255) not null,
    T01_DescUsuario varchar(255) not null,
    T01_NumConexiones int not null default 1,
    T01_FechaHoraUltimaConexion datetime not null,
    T01_Perfil enum('administrador','usuario','profesor','alumno') default 'usuario',
    T01_ImagenUsuario MEDIUMBLOB null
)engine=Innodb;
/*Puesta en uso de mysql para acceder con usuario208DWESLoginLogoff*/
use mysql;
create user if not exists 'user208DWESLoginLogoff'@'%' identified by 'paso';
/*Dotación de todos los privilegios para el usuario crado en esta base de datos*/
grant all privileges on DB208DWESLoginLogoff.* to 'user208DWESLoginLogoff'@'%';
/*Recarga de privilegios*/
FLUSH PRIVILEGES;
/*Puesta en uso de la base de datos*/
/*use DB208DWESLoginLogoff;*/
/*Creación usuario dentro de la propia base de datos para conectarse desde cualquier ip y adjudicación de password*/
/*create user if not exists 'user208DWESLoginLogoff'@'%' identified by 'paso';*/
/*Dotación de todos los privilegios para el usuario crado en esta base de datos*/
/*grant all privileges on DB208DWESLoginLogoff.* to 'user208DWESLoginLogoff'@'%';
/*Recarga de privilegios*/
/*FLUSH PRIVILEGES;*/
    