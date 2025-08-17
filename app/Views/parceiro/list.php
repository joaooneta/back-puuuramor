<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Galeria - Lista</title>

    <script>
        function confirmar() {
            if (!confirm("Deseja remover o post da galeria?")) {
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <?php echo View('templates/header_dashboard.php') ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <?= anchor(base_url("parceiro/create"), "Adicionar parceiro", ["class" => "btn btn-success mb-3"]) ?>

                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Nome</th>
                                <th>Link</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($parceiros as $parceiro): ?>
                                <tr>
                                    <td><img src="<?= base_url('uploads/parceiros/' . $parceiro['logo']) ?>" alt="<?= esc($parceiro['nome']) ?>" style="max-height:80px;"></td>
                                    <td><?= esc($parceiro['nome']) ?></td>
                                    <td>
                                        <a href="<?= esc($parceiro['link']) ?>" target="_blank" class="btn btn-outline-primary">
                                            🐾 Parceiro
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <?= anchor("parceiro/edit/{$parceiro['id']}", "Editar", ["class" => "btn btn-warning btn-sm"]) ?>
                                            <form action="<?= site_url("parceiro/delete/{$parceiro['id']}") ?>" method="post" onsubmit="return confirm('Deseja remover este parceiro?');">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>