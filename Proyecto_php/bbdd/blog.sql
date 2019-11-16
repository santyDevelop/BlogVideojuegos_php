/*Creacion de base de datos y uso*/

CREATE DATABASE IF NOT EXISTS blog_master;
USE blog_master;

/*
    TABLA USUARIOS
    - la id sera la clave primaria y sera auto incremental
    - pk_usuarios es el nombre de la clave primaria 
*/
CREATE TABLE usuarios (
    id          int(255) auto_increment not null,
    nombre      varchar(100) not null,
    apellidos   varchar(100) not null,
    email       varchar(255) not null,
    password    varchar(255) not null,
    fecha       date not null,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

/*
    TABLA CATEGORIAS
    - la id sera la clave primaria y sera autoincremental
    - pk_categorias es el nombre de la clave primaria
*/
CREATE TABLE categorias (
    id          int(255) auto_increment not null,
    nombre      varchar(100),
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

/*
    TABLA ENTRADAS
    - la id sera la clave primaria y sera autoincrement
    - pk_entradas es el nombre de la clave primaria
    - la id_usuario sera la clave secundaria que apunta a la tabla usuarios
    - fk_entrada_usuarios es el nombre de la clave secundaria
    - la id_categoria sera la clave secundaria que apunta a la tabla categorias
    - fk_entrada_categorias es el nombre de la clave secundaria
*/
CREATE TABLE entradas (
    id              int(255) auto_increment not null,
    id_usuario      int(255) not null,    
    id_categoria    int(255) not null,
    titulo          varchar(255) not null,
    descripcion     MEDIUMTEXT,
    fecha           date not null,
    CONSTRAINT pk_entradas PRIMARY KEY(id),
    CONSTRAINT kf_entrada_usuarios FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
    CONSTRAINT kf_entrada_categorias FOREIGN KEY(id_categoria) REFERENCES categorias(id) ON DELETE NO ACTION  
)ENGINE=InnoDb;


 