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

    public function getByAuthor($author)
    {
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
