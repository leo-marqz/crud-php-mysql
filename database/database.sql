CREATE DATABASE crud_php_mysql;

USE crud_php_mysql;

CREATE TABLE task(
id int NOT NULL auto_increment primary key,
title varchar(255) NOT NULL,
description TEXT not null,
created_at timestamp CURRENT_TIME
);


INSERT INTO task (title, description) VALUES ('hola mundo', 'saludo');