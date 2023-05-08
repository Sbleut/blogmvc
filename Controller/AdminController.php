<?php

class AdminController extends BaseController
{
    /**
     * Dashboard : Prepare data and display Administration dashboard view.
     *
     * @return void
     */
    public function Dashboard()
    {
        $articles = $this->ArticleManager->getArticlesByAuthorWithData($this->session->get('user')->getId());        
        $this->addParam("articles", $articles);
        $this->view('admin');
    }

    /**
     * ValidateComment : Validate a given comment from a given article.
     *
     * @param [integer] $article_id
     * @param [integer] $comment_id
     * @return void
     */
    public function ValidateComment($article_id, $comment_id)
    {
        $this->CommentManager->setCommentValidation($comment_id);
        $this->redirect('/Article/'. $article_id);
    }
}

?>