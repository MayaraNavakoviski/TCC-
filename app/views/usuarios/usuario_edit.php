<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>mvc_creator • Editar Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Editar Usuário</h2>
            <a href="<?= URL_BASE ?>/usuarios" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow-sm col-md-8 mx-auto">
            <div class="card-body p-4">
                <form action="<?= URL_BASE ?>/usuarios/atualizar" method="post">

                    <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">

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

                    <hr class="my-4">
                    <p class="text-muted small mb-3">Dados de conexão com o banco de dados do projeto</p>

                    <!-- Usuário banco -->
                    <div class="mb-3">
                        <label for="usuario_banco" class="form-label">Usuário do Banco</label>
                        <input type="text" class="form-control" id="usuario_banco" name="usuario_banco"
                               value="<?= $usuario['usuario_banco'] ?? '' ?>">
                    </div>

                    <!-- Senha banco -->
                    <div class="mb-3">
                        <label for="senha_banco" class="form-label">Senha do Banco</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha_banco" name="senha_banco"
                                   value="<?= $usuario['senha_banco'] ?? '' ?>">
                            <button class="btn btn-outline-secondary" type="button" id="toggleSenhaBanco">
                                <i class="bi bi-eye" id="iconSenhaBanco"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Servidor -->
                    <div class="mb-3">
                        <label for="servidor" class="form-label">Servidor</label>
                        <input type="text" class="form-control" id="servidor" name="servidor"
                               value="<?= $usuario['servidor'] ?? '' ?>">
                    </div>

                    <!-- Tipo de perfil -->
                    <div class="mb-3">
                        <label for="tipo_perfil" class="form-label">Perfil</label>
                        <select class="form-select" id="tipo_perfil" name="tipo_perfil">
                            <option value="usuario" <?= ($usuario['tipo_perfil'] == 'usuario') ? 'selected' : '' ?>>Usuário Padrão</option>
                            <option value="admin"   <?= ($usuario['tipo_perfil'] == 'admin')   ? 'selected' : '' ?>>Administrador</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> Atualizar
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('toggleSenhaBanco').addEventListener('click', function () {
            const input = document.getElementById('senha_banco');
            const icon  = document.getElementById('iconSenhaBanco');
            input.type = input.type === 'password' ? 'text' : 'password';
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>
