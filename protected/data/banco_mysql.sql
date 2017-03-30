CREATE TABLE usuario
(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  email VARCHAR(100),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  salt VARCHAR(100) NOT NULL,
  UNIQUE (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE video (
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descricao VARCHAR(128),
  url VARCHAR(128) NOT NULL,
  nome_contato VARCHAR(128),
  email_contato VARCHAR(128),
  telefone_contato VARCHAR(128)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO usuario (username, nome, password, salt) VALUES ('demo','Usuario Demonstração','2e5c7db760a33498023813489cfadc0b','28b206548469ce62182048fd9cf91760');