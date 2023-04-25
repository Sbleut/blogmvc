<?php
class CommentController extends BaseController
{
    /**
     * Comment Create is function to create an comment from 2 parameters. 
     * It pushs data in Bdd using Comment Manager. 
     * If there is a Bdd Error throw the Bdd error. 
     * Eventually redirect to article's page.
     *
     * @param [intiger] $article
     * @param [string] $content
     * 
     * @return void
     */
    public function CommentCreate($article, $content)
    {
        $comment = new Comment();
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $author = $_SESSION['user']->getId();
        if (in_array("ROLE_USER", $_SESSION['user']->getListRole()))
        {
            $validation = 1;
        }
        $comment->populate($id = null, $content, $date, $author, $article, $validation = 0);
        $result = $this->CommentManager->create($comment, ['content', 'date', 'blogpost_id', 'comment_author', 'validation']);
        if (!$result) {
            throw new BDDCreationException();
        }
        $this->redirect('/Article/' . $article);

    }
}