<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Prestação de Contas - Lista</title>

  <script>
    function confirmar() {
      return confirm("Deseja realmente remover esta prestação de contas?");
    }
  </script>
</head>

<body>
  <?php echo view('templates/header_dashboard.php') ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <?php if (session()->getFlashdata('sucesso')): ?>
          <div class="alert alert-success">
            <?= esc(session()->getFlashdata('sucesso')) ?>
          </div>
        <?php endif ?>

        <?php if (session()->getFlashdata('erro')): ?>
          <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('erro')) ?>
          </div>
        <?php endif ?>

        <?= anchor(base_url("prestacao/criar"), "Adicionar Prestação", ["class" => "btn btn-success mb-3"]) ?>

        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>Imagem</th>
                <th style="width: 200px;">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($prestacoes)): ?>
                <?php foreach ($prestacoes as $prestacao): ?>
                  <tr>
                    <td>
                      <?php if (!empty($prestacao['img'])): ?>
                        <img src="<?= base_url('uploads/prestacoes/' . $prestacao['img']) ?>"
                          alt="Imagem"
                          class="img-fluid rounded"
                          style="max-height: 120px;">
                      <?php else: ?>
                        <img src="https://via.placeholder.com/120x120.png?text=Sem+Imagem"
                          alt="Sem imagem"
                          class="img-fluid rounded"
                          style="max-height: 120px;">
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="d-flex gap-2">
                        <form action="<?= site_url("prestacao/deletar/{$prestacao['id']}") ?>" method="post" onsubmit="return confirmar();">
                          <?= csrf_field() ?>
                          <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <tr>
                  <td colspan="2" class="text-center">Nenhuma prestação de contas cadastrada.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>