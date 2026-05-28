<?php

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Usuario;
use PDO;

class UsuarioRepository {
    private PDO $connection;

    public function __construct() {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getUsuarios(): array  {
        $sql  = "SELECT id_usuario, nome, email, usuario_banco, servidor, tipo_perfil FROM usuario ORDER BY id_usuario DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUsuarioById(int $id): array|false  {
        $sql  = "SELECT id_usuario, nome, email, usuario_banco, senha_banco, servidor, tipo_perfil FROM usuario WHERE id_usuario = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUsuarioByEmail(string $email): Usuario|false {
        $sql  = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();

        if (!$row) {
            return false;
        }

        return Usuario::arrayParaObjeto($row);
    }

    public function saveUsuario(Usuario $usuario): bool  {
        $sql = "INSERT INTO usuario (nome, email, senha_usuario, usuario_banco, senha_banco, servidor, tipo_perfil)
                VALUES (:nome, :email, :senhaUsuario, :usuarioBanco, :senhaBanco, :servidor, :tipoPerfil)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome',         $usuario->getNome());
        $stmt->bindValue(':email',        $usuario->getEmail());
        $stmt->bindValue(':senhaUsuario', password_hash($usuario->getSenhaUsuario(), PASSWORD_BCRYPT));
        $stmt->bindValue(':usuarioBanco', $usuario->getUsuarioBanco());
        $stmt->bindValue(':senhaBanco',   $usuario->getSenhaBanco());
        $stmt->bindValue(':servidor',     $usuario->getServidor());
        $stmt->bindValue(':tipoPerfil',   $usuario->getTipoPerfil());
        return $stmt->execute();
    }

    public function updateUsuario(Usuario $usuario): bool {
        $sql = "UPDATE usuario
                SET nome = :nome, email = :email, usuario_banco = :usuarioBanco,
                    senha_banco = :senhaBanco, servidor = :servidor, tipo_perfil = :tipoPerfil
                WHERE id_usuario = :id";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome',         $usuario->getNome());
        $stmt->bindValue(':email',        $usuario->getEmail());
        $stmt->bindValue(':usuarioBanco', $usuario->getUsuarioBanco());
        $stmt->bindValue(':senhaBanco',   $usuario->getSenhaBanco());
        $stmt->bindValue(':servidor',     $usuario->getServidor());
        $stmt->bindValue(':tipoPerfil',   $usuario->getTipoPerfil());
        $stmt->bindValue(':id',           $usuario->getIdUsuario());
        return $stmt->execute();
    }

    public function deleteUsuario(int $id): bool {
        $sql  = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
