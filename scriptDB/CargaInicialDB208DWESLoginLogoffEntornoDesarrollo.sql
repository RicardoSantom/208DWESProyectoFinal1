/*Puesta en uso de la base de datos*/
use DB208DWESLoginLogoff;
/*Inserción de datos en la tabla Departamento.*/
insert into T02_Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio) 
    values("DAW","Despliegue Aplcaciones Web",now(),2000);
insert into T02_Departamento  (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio) 
    values("DWC","Desarrollo Web Entorno Cliente",now(),1000);
insert into T02_Departamento  (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio)
     values("DWS","Desarrollo Web Entorno Servidor",now(),3000);
insert into T02_Departamento  (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio)
    values("DIW","Diseño Interfaces Web",now(),4000);
insert into T02_Departamento  (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio)
     values("EIE","Empresa e Iniciativa Emprendedora",now(),2);
/*Inserción de datos en la tabla Usuario.*/
insert into T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario,T01_FechaHoraUltimaConexion,T01_Perfil) values
                    ('heraclio',sha2(concat('heraclio','paso'),256),'Heraclio Borbujo Morán', now(),'profesor'),
                    ('alberto',sha2(concat('alberto','paso'),256),'Alberto Bahillo Fernández',now(), 'profesor'),
                    ('amor',sha2(concat('amor','paso'),256),'Amor Rodríguez Navarro',now(), 'profesor'),
                    ('antonio',sha2(concat('antonio','paso'),256),'Antonio Jañez Veleda',now(), 'profesor'),
                    ('carmen',sha2(concat('carmen','paso'),256),'Mª del Carmen Fernández Gallego',now(),'profesor'),
                    ('ricardo',sha2(concat('ricardo','paso'),256),'Ricardo Santiago Tomé',now(), 'alumno'),
                    ('david',sha2(concat('david','paso'),256),'David Aparicio Sir',now(), 'alumno'),
                    ('luis',sha2(concat('luis','paso'),256),'Luis Pérez Astorga',now(), 'alumno'),
                    ('alejandro',sha2(concat('alejandro','paso'),256),'Alejandro Otálvaro Marulanda',now(), 'alumno'),
                    ('josue',sha2(concat('josue','paso'),256),'Josué Martínez Fernández',now(), 'alumno'),
                    ('manuel',sha2(concat('manuel','paso'),256),'Manuel Martín Alonso',now(), 'alumno'),
                    ('admin',sha2(concat('admin','paso'),256),'Administrador', now(),'administrador');