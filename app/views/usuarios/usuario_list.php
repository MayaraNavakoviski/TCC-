<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>mvc_creator • Lista de Usuários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Usuários</h2>
            <a href="<?= URL_BASE ?>/usuarios/cadastrar" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Novo Usuário
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">E-mail</th>
                                <th class="px-4 py-3">Usuário BD</th>
                                <th class="px-4 py-3">Servidor</th>
                                <th class="px-4 py-3">Perfil</th>
                                <th class="px-4 py-3 text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $u): ?>
                                <tr>
                                    <td class="px-4 py-3 align-middle"><?= $u['id_usuario'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $u['nome'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $u['email'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $u['usuario_banco'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $u['servidor'] ?></td>
                                    <td class="px-4 py-3 align-middle">
                                        <span class="badge bg-<?= $u['tipo_perfil'] === 'admin' ? 'danger' : 'secondary' ?>">
                                            <?= $u['tipo_perfil'] ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-end">
                                        <a href="<?= URL_BASE ?>/usuarios/editar?id=<?= $u['id_usuario'] ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <a href="<?= URL_BASE ?>/usuarios/excluir?id=<?= $u['id_usuario'] ?>" class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Deseja excluir o usuário <?= $u['nome'] ?>?')">
                                            <i class="bi bi-trash"></i> Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($usuarios)): ?>
                                <tr>
                                    <td colspan="7" class="px-4 py-4 text-center text-muted">
                                        Nenhum usuário cadastrado.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
