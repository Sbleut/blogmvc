<?php
class ArticleManager extends BaseManager
{
    public function __construct($datasource)
    {
        parent::__construct("article", "Article", $datasource);
    }

    public function getAllArticles($offset, $articlesPerPage)
    {
        $req = $this->bdd->prepare("SELECT * FROM article ORDER BY date DESC LIMIT :offset, :limit");
        $req->bindValue(':offset', $offset, PDO::PARAM_INT);
        $req->bindValue(':limit', $articlesPerPage, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        return $req->fetchAll();
    }

    public function getTotal()
    {
        $req = $this->bdd->query("SELECT COUNT(*) FROM article");
        return $req->fetchColumn();
    }

    public function getById($id)
    {
        $req = $this->bdd->prepare("SELECT * FROM article WHERE id=?");
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        return $req->fetch();
    }

    public function getByIdWithData($id)
    {
        $req = $this->bdd->prepare(
            "SELECT article.*, CONCAT(user.name, ' ',  user.last_name) AS author FROM article 
            INNER JOIN user
                ON article.post_author = user.id
            WHERE article.id=?"
        );
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        $article = $req->fetch();
        $req = $this->bdd->prepare(
            "SELECT comment.*, CONCAT(user.name, ' ',  user.last_name) AS author FROM comment
            INNER JOIN user
                ON comment.comment_author = user.id
            WHERE comment.blogpost_id=?
            ORDER BY comment.date"
        );
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comment");
        $article->commentList = $req->fetchAll();
        return $article;
    }

    public function getArticlesByAuthorWithData($id)
    {
        $req = $this->bdd->prepare(
            "SELECT article.*, CONCAT(user.name, ' ',  user.last_name) AS author FROM article 
            INNER JOIN user
                ON article.post_author = user.id
            WHERE article.post_author=?"
        );
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        $articles = $req->fetchAll();
        foreach ($articles as $article) 
        {
            $req = $this->bdd->prepare(
                "SELECT comment.*, CONCAT(user.name, ' ',  user.last_name) AS author FROM comment
                    INNER JOIN user
                        ON comment.comment_author = user.id
                    WHERE comment.blogpost_id=? AND comment.validation=0
                    ORDER BY comment.date"
            );
            $req->execute(array($article->id));
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comment");
            $article->commentList = $req->fetchAll();
        }
        return $articles;
    }

    public function getByAuthor($author)
    {
        $req = $this->bdd->prepare("SELECT * FROM user WHERE id=?");
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
        return $req->fetchAll();
    }

    public function getComment($article)
    {
        $req = $this->bdd->prepare("SELECT * FROM comment WHERE blogpost_id=?");
        $req->execute(array($article));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comment");
        return $req->fetchAll();
    }

    public function getByDate($date)
    {
        $req = $this->bdd->prepare("SELECT * FROM article WHERE date=?");
        $req->execute(array($date));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        return $req->fetch();
    }

    public function getAuthor($author)
    {
        $req = $this->bdd->prepare("SELECT * FROM user WHERE id=?");
        $req->execute(array($author));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
        return $req->fetch();
    }
}
