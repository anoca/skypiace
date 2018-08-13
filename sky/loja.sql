DROP DATABASE LOJA;
CREATE DATABASE LOJA;

USE LOJA;

CREATE TABLE usuario(
idUsuario INT AUTO_INCREMENT,
nome VARCHAR(60),
email VARCHAR(60),
senha VARCHAR(60),
cpf VARCHAR(11),
dtNasc DATE,
PRIMARY KEY(idUsuario)
) engine = innodb;


CREATE TABLE produto(
idProduto INT AUTO_INCREMENT,
nmProduto VARCHAR(60) NOT NULL,
preco FLOAT NOT NULL,
descricao VARCHAR(11),
sabor VARCHAR(11),
PRIMARY KEY(idProduto)
) engine = innodb;


CREATE TABLE pedido(
idPedido INT AUTO_INCREMENT,
idUsuario INT NOT NULL,
idProduto INT NOT NULL,
quantidade INT NOT NULL,
email VARCHAR(60),
cpf VARCHAR(11),
celular VARCHAR(11),
sexo VARCHAR(1),
PRIMARY KEY(idPedido) ,
FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario),
FOREIGN KEY(idProduto) REFERENCES produto(idProduto)
) engine = innodb;


CREATE TABLE pedido_produto(
idPedido_produto INT AUTO_INCREMENT,
idProduto INT NOT NULL,
idPedido INT NOT NULL,
PRIMARY KEY(idPedido_produto),
FOREIGN KEY(idProduto) REFERENCES produto(idProduto),
FOREIGN KEY(idPedido) REFERENCES pedido(idPedido)
) engine = innodb;