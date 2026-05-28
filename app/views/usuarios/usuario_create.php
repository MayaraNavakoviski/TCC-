<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>mvc_creator • Novo Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Novo Usuário</h2>
            <a href="<?= URL_BASE ?>/usuarios" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow-sm col-md-8 mx-auto">
            <div class="card-body p-4">
                <form action="<?= URL_BASE ?>/usuarios/salvar" method="post">

                    <!-- Nome -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                               value="<?= $usuario['nome'] ?? '' ?>">
                        <?php if (isset($erros['nome'])): ?>
                            <div class="text-danger small"><?= $erros['nome'] ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- E-mail -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= $usuario['email'] ?? '' ?>">
                        <?php if (isset($erros['email'])): ?>
                            <div class="text-danger small"><?= $erros['email'] ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Senha do usuário (login) -->
                    <div class="mb-3">
                        <label for="senha_usuario" class="form-label">Senha de Acesso</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha_usuario" name="senha_usuario">
                            <button class="btn btn-outline-secondary" type="button" id="toggleSenhaUsuario">
                                <i class="bi bi-eye" id="iconSenhaUsuario"></i>
                            </button>
                        </div>
                        <?php if (isset($erros['senha_usuario'])): ?>
                            <div class="text-danger small"><?= $erros['senha_usuario'] ?></div>
                        <?php endif; ?>
                    </div>

                    <hr class="my-4">
                    <p class="text-muted small mb-3">Dados de conexão com o banco de dados do projeto</p>

                    <!-- Usuário banco -->
                    <div class="mb-3">
                        <label for="usuario_banco" class="form-label">Usuário do Banco</label>
                        <input type="text" class="form-control" id="usuario_banco" name="usuario_banco"
                               value="<?= $usuario['usuario_banco'] ?? '' ?>">
                        <?php if (isset($erros['usuario_banco'])): ?>
                            <div class="text-danger small"><?= $erros['usuario_banco'] ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Senha banco -->
                    <div class="mb-3">
                        <label for="senha_banco" class="form-label">Senha do Banco</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha_banco" name="senha_banco">
                            <button class="btn btn-outline-secondary" type="button" id="toggleSenhaBanco">
                                <i class="bi bi-eye" id="iconSenhaBanco"></i>
                            </button>
                        </div>
                        <?php if (isset($erros['senha_banco'])): ?>
                            <div class="text-danger small"><?= $erros['senha_banco'] ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Servidor -->
                    <div class="mb-3">
                        <label for="servidor" class="form-label">Servidor</label>
                        <input type="text" class="form-control" id="servidor" name="servidor"
                               placeholder="ex: localhost ou 192.168.0.1"
                               value="<?= $usuario['servidor'] ?? '' ?>">
                        <?php if (isset($erros['servidor'])): ?>
                            <div class="text-danger small"><?= $erros['servidor'] ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Tipo de perfil -->
                    <div class="mb-3">
                        <label for="tipo_perfil" class="form-label">Perfil</label>
                        <select class="form-select" id="tipo_perfil" name="tipo_perfil">
                            <option value="usuario" <?= (!isset($usuario['tipo_perfil']) || $usuario['tipo_perfil'] == 'usuario') ? 'selected' : '' ?>>Usuário Padrão</option>
                            <option value="admin"   <?= (isset($usuario['tipo_perfil']) && $usuario['tipo_perfil'] == 'admin')   ? 'selected' : '' ?>>Administrador</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> Salvar
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSenha(btnId, inputId, iconId) {
            document.getElementById(btnId).addEventListener('click', function () {
                const input = document.getElementById(inputId);
                const icon  = document.getElementById(iconId);
                input.type = input.type === 'password' ? 'text' : 'password';
                icon.classList.toggle('bi-eye');
                icon.classList.toggle('bi-eye-slash');
            });
        }

        toggleSenha('toggleSenhaUsuario', 'senha_usuario', 'iconSenhaUsuario');
        toggleSenha('toggleSenhaBanco',   'senha_banco',   'iconSenhaBanco');
    </script>
</body>
</html>
