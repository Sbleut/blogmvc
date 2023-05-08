<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <!-- link tiny MCE : Text enhanced text editor-->

    <title><?= $title; ?></title>
    <?= $jsContent; ?>
    <?= $cssContent; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>">Mon Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>/Articles/1">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>">À Propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>">Contact</a>
                        </li>
                    </ul>
                    <?php
                    if (empty($_SESSION)) { ?><button class="btn btn-primary"><a class="text-light" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>/Login">Se connecter</a></button>
                    <?php }
                    if (!empty($_SESSION)) {?>
                        <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>/Admin">Mes articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>/Profil">Mon profil</a>
                        </li>
                        </ul>
                        <button class="btn btn-primary"><a class="text-light" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8')?>/Logout">Se déconnecter</a></button>
                    <?php }?>

                </div>
            </div>
        </nav>

    </header>
    <?= $content; ?>

    <footer>
        <nav>

        </nav>
    </footer>
</body>

</html>