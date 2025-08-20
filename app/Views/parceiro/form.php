<?php helper('form'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Galeria - Adicionar</title>
</head>

<body>
    <?php echo View('templates/header_dashboard.php') ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session('errors') as $erro): ?>
                            <li><?= esc($erro) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>

            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">
                            <?= isset($parceiro) ? 'Editando Parceiro' : 'Cadastrando Parceiro' ?>
                        </h5>

                        <?= form_open("parceiro/store", ['enctype' => 'multipart/form-data']) ?>
                        <input type="hidden" name="id" value="<?= esc($parceiro['id'] ?? '') ?>">

                        <?php if (!empty($parceiro['logo'])): ?>
                            <div class="mb-3 text-center">
                                <img src="<?= base_url('uploads/parceiros/' . $parceiro['logo']) ?>" alt="Logo atual" class="img-fluid rounded" style="max-height: 120px;">
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= esc(set_value('nome', $parceiro['nome'] ?? '')) ?>" required maxlength="100">
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="url" name="link" id="link" class="form-control" value="<?= esc(set_value('link', $parceiro['link'] ?? '')) ?>" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>