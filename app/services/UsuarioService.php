<?php

namespace app\services;

use app\models\Usuario;
use app\repositories\UsuarioRepository;

class UsuarioServiceb{
    private UsuarioRepository $repository;

    public function __construct() {
        $this->repository = new UsuarioRepository();
    }

    public function getUsuarios(): array {
        return $this->repository->getUsuarios();
    }

    public function getUsuarioById(int $id): array|false  {
        return $this->repository->getUsuarioById($id);
    }

    public function saveUsuario(Usuario $usuario): bool {
        $usuarioExistente = $this->repository->getUsuarioByEmail($usuario->getEmail());

        if ($usuarioExistente) {
            return false;
        }

        return $this->repository->saveUsuario($usuario);
    }

    public function updateUsuario(Usuario $usuario): bool {
        return $this->repository->updateUsuario($usuario);
    }

    public function deleteUsuario(int $id): bool {
        return $this->repository->deleteUsuario($id);
    }
}
