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
        if($this->isAdmin()===false){
            $this->redirect('/Login');            
        }
        $articles = $this->ArticleManager->getArticlesByAuthorWithData($this->session->get('user')->getId());        
        $this->addParam("articles", $articles);
        $this->view('admin');
    }

    /**
     * AdminRequestGet : Display Admin request page
     *
     * @return void
     */
    public function AdminRequestGet()
    {
        if($this->checkLoggedIn()===false){
            $this->redirect('/');            
        }
        $this->view('admin-request');
    }

    /**
     * AdminRequestPost : Manage Admin-request
     * 
     * @param [sting] $content
     *
     * @return void
     */
    public function AdminRequestPost($content)
    {
        $adminRequest = new Mail();
        $name =$this->session->get('user')->getName();
        $mail = $this->session->get('user')->getMail();
        $adminRequest->populate($id =null, $name, $mail, $content, true);
        $bddPush = $this->HomeManager->create($adminRequest, ['name', 'email_address', 'message', 'admin_request']);
		if ($bddPush===false) {
            throw new BDDCreationException();
        }
		// Redirect Profile Page.
        $confirmationMessage = 'Your action was successful!';
        $this->session->set("confirmationMessage", $confirmationMessage);
        $this->redirect('/');
    }

    /**
     * AdminValidateGet : Validate Admin-request
     * 
     * @param [int] $mail_id
     *
     * @return void
     */
    public function AdminValidateGet($mail_id)
    {
        $mail = $this->HomeManager->getById($mail_id);
        
        $user = $this->UserManager->getByMail($mail->getEmail_address());

        $bddPush = $this->UserManager->addNewRole($user->getId(), 1);
        
		if ($bddPush===false) {
            throw new BDDCreationException();
        }

        $this->HomeManager->delete($mail);
		// Redirect Profile Page.
        $confirmationMessage = 'Your action was successful!';
        $this->session->set("confirmationMessage", $confirmationMessage);
        $this->redirect('/');
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