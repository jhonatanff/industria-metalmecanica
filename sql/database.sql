// Fecha de creacion de base de datos
-- 06/10/2024 
-- 03:10 pm

//Creacion de bd y tabla de usuario;

CREATE DATABASE agroindustria;
USE DATABASE;
CREATE TABLE usuarios (id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                       nombre VARCHAR(255) NOT NULL,
                       numero_identificacion VARCHAR(255) NOT NULL,
                       email VARCHAR(255) NOT NULL,
                       password VARCHAR(255) NOT NULL);