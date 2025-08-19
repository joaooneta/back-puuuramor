<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Cagliostro&display=swap" rel="stylesheet">
    <script defer src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/header_footer.css') ?>">

    <title>Prestações de Contas | Puuuramor</title>
</head>

<body>
    <?php echo view('header.php') ?>

    <section id="main" class="container py-5 text-center">
        <h2 class="mt-5 mb-3">Prestações de Contas</h2>
        <p class="mb-5">Confira as imagens das nossas prestações de contas!</p>

        <?php if (empty($prestacoes)): ?>
            <p>Nenhuma prestação de contas cadastrada no momento :(</p>
            <p class="mb-5">Volte mais tarde!</p>
        <?php endif; ?>

        <div class="row">
            <?php foreach ($prestacoes as $prestacao): ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        <?php if (!empty($prestacao['img'])): ?>
                            <img src="<?= base_url('uploads/prestacoes/' . $prestacao['img']) ?>"
                                alt="Prestação de Contas"
                                class="card-img-top"
                                style="width: 100%; height: auto;">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/350x350.png?text=Sem+Imagem"
                                alt="Sem imagem"
                                class="card-img-top"
                                style="width: 100%; height: auto;">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>

    <?= view('templates/footer') ?>

</body>

</html>