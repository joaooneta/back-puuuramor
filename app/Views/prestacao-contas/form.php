<?php helper('form'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Prestação de Contas - Formulário</title>
</head>

<body>
  <?php echo view('templates/header_dashboard.php') ?>

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
              <?= isset($prestacao) ? 'Editando Prestação de Contas' : 'Cadastrando Prestação de Contas' ?>
            </h5>

            <?= form_open("prestacao/salvar", ['enctype' => 'multipart/form-data']) ?>
            <input type="hidden" name="id" value="<?= esc($prestacao['id'] ?? '') ?>">

            <?php if (!empty($prestacao['img'])): ?>
              <div class="mb-3 text-center">
                <img src="<?= base_url('uploads/prestacoes/' . $prestacao['img']) ?>"
                  alt="Imagem atual"
                  class="img-fluid rounded"
                  style="max-height: 200px;">
              </div>
            <?php endif; ?>

            <div class="mb-3">
              <label for="img" class="form-label">Imagem</label>
              <input type="file" name="img" id="img" class="form-control" accept="image/*">
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