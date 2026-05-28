<?php

namespace app\models;

class Usuario
{
    private int $idUsuario;
    private string $nome;
    private string $email;
    private string $senhaUsuario;
    private string $usuarioBanco;
    private string $senhaBanco;
    private string $servidor;
    private string $tipoPerfil;

    public function __construct(
        int    $idUsuario,
        string $nome,
        string $email,
        string $senhaUsuario,
        string $usuarioBanco,
        string $senhaBanco,
        string $servidor,
        string $tipoPerfil
    ) {
        $this->idUsuario    = $idUsuario;
        $this->nome         = $nome;
        $this->email        = $email;
        $this->senhaUsuario = $senhaUsuario;
        $this->usuarioBanco = $usuarioBanco;
        $this->senhaBanco   = $senhaBanco;
        $this->servidor     = $servidor;
        $this->tipoPerfil   = $tipoPerfil;
    }

    public function getIdUsuario(): int {
        return $this->idUsuario;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenhaUsuario(): string {
        return $this->senhaUsuario;
    }

    public function getUsuarioBanco(): string {
        return $this->usuarioBanco;
    }

    public function getSenhaBanco(): string {
        return $this->senhaBanco;
    }

    public function getServidor(): string {
        return $this->servidor;
    }

    public function getTipoPerfil(): string {
        return $this->tipoPerfil;
    }

    public function eAdmin(): bool {
        return $this->tipoPerfil === 'admin';
    }

    public static function arrayParaObjeto(array $usuario): self {
        return new self(
            $usuario['id_usuario'],
            $usuario['nome'],
            $usuario['email'],
            $usuario['senha_usuario'],
            $usuario['usuario_banco'],
            $usuario['senha_banco'],
            $usuario['servidor'],
            $usuario['tipo_perfil']
        );
    }
}
