<?php

// 1) List of Admin Function()

// 2) Rights verification

class AdminController extends BaseController
{

    public function Dashboard()
    {
        $articles = $this->ArticleManager->getArticlesByAuthorWithData($_SESSION['user']->getId());        
        $this->addParam("articles", $articles);
        $this->view('admin');
    }

    public function ValidateComment($article_id, $comment_id)
    {
        $this->CommentManager->setCommentValidation($comment_id);
        $this->redirect('/Article/'. $article_id);
    }

    // private function isAdmin()
    // {
    //     if(isset($_SESSION['user]']) && in_array('ROLE_ADMIN', $_SESSION['user']['roles']));
    // }
    
}

?>