<div class="container">
    <h1>Create Article</h1>
    <form action="ArticleCreate" method="post">
        <div class="form-group mt-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group  mt-3">
            <label for="chapo">Chapo</label>
            <input type="text" class="form-control" id="chapo" name="chapo" required>
        </div>
        <div class="form-group  mt-3">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>