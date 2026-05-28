CREATE SCHEMA IF NOT EXISTS mvc_creator DEFAULT CHARACTER SET utf8;
USE mvc_creator;

CREATE TABLE IF NOT EXISTS mvc_creator.usuario (
    id_usuario      INT          NOT NULL AUTO_INCREMENT,
    nome            VARCHAR(60)  NOT NULL,
    email           VARCHAR(60)  NOT NULL,
    senha_usuario   VARCHAR(255) NOT NULL,
    usuario_banco   VARCHAR(60)  NOT NULL,
    senha_banco     VARCHAR(255) NOT NULL,
    servidor        VARCHAR(60)  NOT NULL,
    tipo_perfil     ENUM('admin', 'usuario') NOT NULL DEFAULT 'usuario',
    PRIMARY KEY (id_usuario)
) ENGINE = InnoDB;
