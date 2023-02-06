/*
    Autor: Ricardo Santiago Tomé.
    Utilidad: Este programa consiste en borrar la base de datos DB208DWESLoginLogoff y borrar el usuario 'user208DWESLoginLogoff'.
    Fecha-última-revisión: 11-01-2023.
*/
-- Borrar la base de datos DB208DWESLoginLogoff.
drop database if exists DB208DWESLoginLogoff;
-- Borrar el usuario user208DWESLoginLogoff.
drop user if exists 'user208DWESLoginLogoff'@'%';