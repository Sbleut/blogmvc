<div class="container">
    <div class="d-flex">
        <h1 class="mt-5"><?= $article->title ?></h1>
    </div>
    <h4 class="mt-3"><?= $article->chapo ?></h4>
    <p class="text-muted mt-3">Ecrit par <?= $article->author ?> le <?= $article->date ?></p>
    <hr>
    <div class="mt-3"><?= htmlspecialchars($article->content, ENT_QUOTES, 'UTF-8') ?></div>
    <?php
    if (!empty($_SESSION) && in_array("ROLE_ADMIN", $_SESSION['user']->getListRole()) && $_SESSION['user']->getId() == $article->post_author) {
        echo ('<button class="btn btn-primary"><a class="text-reset" href="' . $config->basepath . '/ArticleUpdate/' . $article->id . '">Modifier</a></button>');
    }
    ?>

    <div class="container">
        <?php
        if (!empty($_SESSION) && in_array("ROLE_USER", $_SESSION['user']->getListRole())) {
            echo ('<h1>Send your comment</h1>
        <form action="CommentCreate" method="post">
            
            <div class="form-group">
                <input type=hidden name="article" value="' . $article->id . '">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>');
        }
        ?>
        <?php
        foreach ($article->commentList as $comment) {
        ?>
            <div class="card my-3">
                <div class="card-body">
                    <p class="card-text"><?= $comment->content; ?></p>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $comment->date; ?></h6>
                    <p><?= $comment->author; ?></p>

                </div>
            </div>
        <?php } ?>
    </div>


</div>