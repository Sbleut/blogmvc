<div class="container">
    <h1>Modifier l'Article</h1>
    <form action="<?=$config->basepath?>/ArticleUpdate" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($article->id, ENT_QUOTES, 'UTF-8')?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
        <div class="form-group">
            <label for="chapo">Chapo</label>
            <input type="text" class="form-control" id="chapo" name="chapo" value="<?=htmlspecialchars($article->chapo, ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required value="<?=htmlspecialchars($article->content, ENT_COMPAT, 'UTF-8') ?>"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>