<?php

namespace app\controllers;

use app\core\Controller;
use app\helpers\Validador;
use app\models\Usuario;
use app\services\UsuarioService;

class UsuarioController extends Controller{
    private UsuarioService $service;

    public function __construct(){
        $this->service = new UsuarioService();
    }

    public function index(){
        $data['usuarios'] = $this->service->getUsuarios();
        $this->view('usuarios/usuario_list', $data);
    }

    public function cadastrar(){
        $this->view('usuarios/usuario_create');
    }

    public function salvar(){
        $validador = new Validador();

        $nome         = filter_input(INPUT_POST, 'nome',          FILTER_SANITIZE_SPECIAL_CHARS);
        $email        = filter_input(INPUT_POST, 'email',         FILTER_SANITIZE_EMAIL);
        $senhaUsuario = $_POST['senha_usuario'];
        $usuarioBanco = filter_input(INPUT_POST, 'usuario_banco', FILTER_SANITIZE_SPECIAL_CHARS);
        $senhaBanco   = $_POST['senha_banco'];
        $servidor     = filter_input(INPUT_POST, 'servidor',      FILTER_SANITIZE_SPECIAL_CHARS);
        $tipoPerfil   = $_POST['tipo_perfil'];

        $validador->obrigatorio('nome',          $nome);
        $validador->obrigatorio('email',         $email);
        $validador->obrigatorio('senha_usuario', $senhaUsuario);
        $validador->obrigatorio('usuario_banco', $usuarioBanco);
        $validador->obrigatorio('senha_banco',   $senhaBanco);
        $validador->obrigatorio('servidor',      $servidor);

        if ($validador->temErros()) {
            $data['usuario'] = $_POST;
            $data['erros']   = $validador->getErros();
            $this->view('usuarios/usuario_create', $data);
            return;
        }

        $usuario = new Usuario(0, $nome, $email, $senhaUsuario, $usuarioBanco, $senhaBanco, $servidor, $tipoPerfil);

        if ($this->service->saveUsuario($usuario)) {
            $this->redirect(URL_BASE . '/usuarios');
        } else {
            $data['usuario']         = $_POST;
            $data['erros']['email']  = 'Este e-mail já está cadastrado.';
            $this->view('usuarios/usuario_create', $data);
        }
    }

    public function editar(){
        $id             = (int) $_GET['id'];
        $data['usuario'] = $this->service->getUsuarioById($id);
        $this->view('usuarios/usuario_edit', $data);
    }

    public function atualizar(){
        $usuario = new Usuario(
            (int) $_POST['id_usuario'],
            $_POST['nome'],
            $_POST['email'],
            '',
            $_POST['usuario_banco'],
            $_POST['senha_banco'],
            $_POST['servidor'],
            $_POST['tipo_perfil']
        );

        $this->service->updateUsuario($usuario);
        $this->redirect(URL_BASE . '/usuarios');
    }

    public function excluir() {
        $id = (int) $_GET['id'];
        $this->service->deleteUsuario($id);
        $this->redirect(URL_BASE . '/usuarios');
    }
}
