<div class="container">
    <div class="d-flex">
            <h1 class="mt-5"><?= $article->title ?></h1>
        </div>
        <h4 class="mt-3"><?= $article->chapo ?></h4>
        <p class="text-muted mt-3">Ecrit par <?= $article->post_author->getName() ?> le <?= $article->date ?></p>
        <hr>
        <div class="mt-3"><?= $article->content ?></div>

    <?php
    if (!empty($_SESSION) && in_array("ROLE_ADMIN", $_SESSION['user']->getListRole()[0]) && $_SESSION['user']->getId() == $article->post_author->getId()) 
    {
        echo ('<button class="btn btn-primary"><a class="" href="'.$config->basepath.'/ArticleUpdate/'. $article->id.'">Modifier</a></button>');
    }
    ?>
        

</div>