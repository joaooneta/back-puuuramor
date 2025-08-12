<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puuuramor | ONG de Resgate Animal</title>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Cagliostro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/header_footer.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
    <script defer src="<?= base_url('assets/js/home.js') ?>"></script>
</head>

<body class="bg-light">
    <?php echo View('header.php') ?>
    <section class="hero">
        <h1 style="z-index: 2;">Bem-vindo à Puuuramor</h1>
        <p style="z-index: 2;">Uma ONG dedicada ao resgate e adoção de animais em busca de um lar amoroso.</p>
        <a href="<?= base_url('adotar') ?>" class="btn-hero" style="z-index: 2;">Ver animais para adoção</a>
    </section>

    <section id="nossa-historia" class="bg-white py-5">
        <div class="container">
            <!-- Título da notícia -->
            <div class="mb-4 text-center">
                <h1 class="display-5 fw-bold ">O nascimento do Projeto Puuur Amor</h1>
                <p class=" fst-italic">Como um resgate mudou o destino de duas protetoras – e centenas de animais</p>
                <small>Nossa História</small>
            </div>

            <!-- Imagem de destaque -->
            <div class="mb-5">
                <img src="<?= base_url('assets/images/animais/cachorro2.jpeg') ?>" alt="Imagem do projeto" class="img-fluid rounded-4 shadow w-100" style="max-height: 450px; object-fit: cover;">
            </div>

            <!-- Corpo da notícia -->
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <p class="fs-5 mb-4">O Projeto Puuur Amor nasceu a partir de um encontro que mudou o curso de duas vidas – e, desde então, a de centenas de animais. Em setembro de 2017, as protetoras Andressa Einloft e Kátia Einloft resgataram uma gatinha grávida abandonada em uma rua de Charqueadas. A partir desse gesto, identificaram um propósito comum: acolher, cuidar e oferecer uma nova chance aos animais que não tinham um lar.</p>

                    <p class="fs-5 mb-4">Em 2018, foi construído o primeiro gatil, simples, porém acolhedor. Ele abrigava, inicialmente, 12 gatos – incluindo mães prenhas e filhotes abandonados. Nos dois primeiros anos, o trabalho foi realizado de forma totalmente independente, dentro da própria residência das fundadoras, com recursos financeiros próprios, dedicação diária e o objetivo de proporcionar novos lares aos animais resgatados.</p>

                    <!-- Imagem no meio do texto -->
                    <div class="text-center my-5">
                        <img src="<?= base_url('assets/images/animais/gato1.jpeg') ?>" alt="Gatil e resgates" class="img-fluid rounded-3 shadow" style="max-height: 400px;">
                    </div>

                    <p class="fs-5 mb-4">Com o tempo, o número de resgates aumentou, assim como os desafios. Em 2019, a mudança de endereço e os custos com aluguel trouxeram instabilidade financeira, especialmente diante da crescente demanda por cuidados veterinários, alimentação e medicamentos para os cerca de 20 animais já sob tutela.</p>

                    <p class="fs-5 mb-4">A chegada da pandemia, em 2020, impôs ainda mais obstáculos. Mas também revelou o poder da mobilização. Por meio das redes sociais, surgiram os primeiros apoiadores, pessoas sensibilizadas pela causa que decidiram contribuir. Rifas, doações e parcerias pontuais ajudaram a manter a estrutura e garantiram a continuidade do trabalho. No ano seguinte, oficialmente, nascia o Projeto Puuur Amor.</p>

                    <p class="fs-5 mb-4">Hoje, mesmo com maior reconhecimento na cidade, a ONG segue enfrentando limitações: ainda não possui sede própria, nem tem um próprio meio de locomoção, não conta com patrocínio fixo e depende exclusivamente da solidariedade de quem acredita na causa. Todo animal acolhido recebe atendimento veterinário, é vermifugado, vacinado e castrado antes de ser disponibilizado para adoção responsável.</p>

                    <p class="fs-5 mb-4">O cuidado vai muito além do básico. Muitos dos gatos chegam em situação crítica – vítimas de maus-tratos, doenças graves, traumas emocionais e desnutrição. Há filhotes que necessitam de mamadeira de três em três horas, casos que exigem medicação frequente e acompanhamento constante.</p>

                    <p class="fs-5 mb-4">Apesar dos momentos de exaustão e das dores inevitáveis dessa missão, seguimos em frente. Porque cada vida salva representa uma vitória. Cada lar conquistado renova a esperança. Cada gesto de apoio reafirma nosso propósito.</p>

                    <p class="fs-5">O Projeto Puuur Amor é, acima de tudo, uma escolha diária por empatia, compromisso e respeito à vida. E enquanto houver animais precisando de ajuda, nossa luta continuará — com coragem, responsabilidade e, claro, muito amor.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="missao-valores" class="py-5 bg-dark">
        <div class="container text-white">
            <div class="row align-items-center">
                <!-- Coluna de imagem ilustrativa -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="<?= base_url('assets/images/animais/gato2.jpg') ?>" alt="Missão do projeto" class="img-fluid rounded-4 shadow">
                </div>

                <!-- Coluna de conteúdo -->
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3 ">Nossa Missão</h2>
                    <p class="fs-5 mb-3">
                        O <strong>Projeto Puuur Amor</strong> é uma iniciativa independente que atua em Charqueadas/RS com foco no <strong>resgate, acolhimento e adoções responsáveis</strong> de gatos em situação de abandono.
                    </p>

                    <div class="mb-3 d-flex">
                        <i class="bi bi-heart-pulse-fill text-danger fs-4 me-3"></i>
                        <p class="mb-0 fs-5">
                            Conscientizamos sobre a <strong>importância da castração</strong> para conter o ciclo de sofrimento e abandono nas ruas.
                        </p>
                    </div>

                    <div class="mb-3 d-flex">
                        <i class="bi bi-house-heart-fill text-primary fs-4 me-3"></i>
                        <p class="mb-0 fs-5">
                            Cuidamos dos acolhidos com carinho na <strong>sede do projeto</strong> e em lares temporários de voluntários.
                        </p>
                    </div>

                    <div class="mb-3 d-flex">
                        <i class="bi bi-paw-fill text-warning fs-4 me-3"></i>
                        <p class="mb-0 fs-5">
                            Atualmente cuidamos de <strong>44 animais</strong> (41 gatos e 3 cães), todos preparados com atenção para adoção.
                        </p>
                    </div>

                    <p class="fs-5 mt-4">
                        Se você acredita na nossa missão, existem muitas formas de ajudar: <strong>adotando, apadrinhando, sendo voluntário, compartilhando</strong> ou contribuindo com doações.
                    </p>
                    <!-- Botão de apoio -->
                    <a href="<?= base_url('quero_ajudar') ?>" class="btn btn-success btn-lg mt-3 px-4">Quero Ajudar</a>

                </div>
            </div>
        </div>
    </section>


</body>

</html>
<?php echo View('templates/footer') ?>