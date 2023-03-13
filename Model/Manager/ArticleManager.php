<?php
class ArticleManager extends BaseManager
{
    public function __construct($datasource)
    {
        parent::__construct("article", "Article", $datasource);
    }

    public function getAllArticles()
    {
        $req = $this->bdd->prepare("SELECT * FROM blogpost");
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        return $req->fetchAll();
    }

    public function getByAuthor($author)
    {
    }

    public function getAuthor($author)
    {
        $req = $this->bdd->prepare("SELECT * FROM user WHERE id=?");
        $req->execute(array($author));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
        return $req->fetch();
    }
}
