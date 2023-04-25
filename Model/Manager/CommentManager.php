<?php
class CommentManager extends BaseManager
{
    public function __construct($datasource)
    {
        parent::__construct("comment", "Comment", $datasource);
    }

    public function getByArticle($id)
    {
        $req =$this->bdd->prepare("SELECT * FROM user WHERE id=?");
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Comment");
		return $req->fetch();
    }

    public function setCommentValidation($id)
    {
        $req =$this->bdd->prepare("UPDATE comment SET validation=1  WHERE id=?");
        $req->execute(array($id));
    }    

}