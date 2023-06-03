<div class="container">
    <div class="d-flex">
        <h1 class="mt-5"><?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8') ?></h1>
    </div>
    <h4 class="mt-3"><?= htmlspecialchars($article->chapo, ENT_QUOTES, 'UTF-8') ?></h4>
    <p class="text-muted mt-3">Ecrit par <?= htmlspecialchars($article->author, ENT_QUOTES, 'UTF-8') ?> le <?= htmlspecialchars($article->date, ENT_QUOTES, 'UTF-8') ?></p>
    <hr>
    <div class="mt-3"><p><?= htmlentities($article->content, ENT_SUBSTITUTE, 'UTF-8') ?></p></div>
    <?php
    if ($this->checkLoggedIn() && $this->isAdmin() && $authorisuser) { ?>
        <button class="btn btn-primary"><a class="text-reset" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8') . '/ArticleUpdate/' . htmlspecialchars($article->id, ENT_QUOTES, 'UTF-8') ?>">Modifier</a></button>
    <?php }?>

    <div class="container">
        <?php
        if ($this->checkLoggedIn() && !$this->isAdmin()) { ?>
        <h1>Send your comment</h1>
        <form action="CommentCreate" method="post">
            
            <div class="form-group">
                <input type=hidden name="article" value="<?= $article->id ?>">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <?php }
        ?>
        <?php
        foreach ($article->commentList as $comment) {
        ?>
            <div class="card my-3">
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars($comment->content, ENT_QUOTES, 'UTF-8') ?></p>
                    <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($comment->date, ENT_QUOTES, 'UTF-8') ?></h6>
                    <p><?= htmlspecialchars($comment->author, ENT_QUOTES, 'UTF-8') ?></p>

                </div>
            </div>
        <?php } ?>
    </div>


</div>