<div class="container">
    <h1 class="mt-5"><?= $article->title ?></h1>
    <h4 class="mt-3"><?= $article->chapo ?></h4>
    <p class="text-muted mt-3">Ecrit par <?= $article->post_author ?> le <?= $article->date ?></p>
    <hr>
    <div class="mt-3"><?= $article->content ?></div>
</div>