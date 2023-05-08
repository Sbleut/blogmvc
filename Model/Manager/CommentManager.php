<?php
/**
 * A manager class for managing comments in the database.
 */
class CommentManager extends BaseManager
{
    /**
     * CommentManager constructor.
     *
     * @param object $datasource The database configuration object.
     */
    public function __construct($datasource)
    {
        parent::__construct("comment", "Comment", $datasource);
    }

    /**
     * Get a comment by article ID.
     *
     * @param int $id The ID of the article to get the comments for.
     * @return Comment The comment object for the given article.
     */
    public function getByArticle($id)
    {
        $req =$this->bdd->prepare("SELECT * FROM user WHERE id=?");
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Comment");
		return $req->fetch();
    }

    /**
     * Set the validation status of a comment.
     *
     * @param int $id The ID of the comment to update.
     */
    public function setCommentValidation($id)
    {
        $req =$this->bdd->prepare("UPDATE comment SET validation=1  WHERE id=?");
        $req->execute(array($id));
    }
}
