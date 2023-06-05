<?php

/**
 * HomeController : The HomeController class is responsible for rendering the home page view.
 */
class HomeController extends BaseController
{
	/**
	 * Home : renders the home page view using the 'home' template.
	 *
	 * @return void
	 */


	public function Home()
	{
		$this->view("home");
	}

	public function MailCreate($name, $email, $message, $admin_request=0)
	{
		$mail = new Mail();
		$mail->populate($id = null, $name, $email, $message, $admin_request);
		$bddPush = $this->HomeManager->create($mail, ['name', 'email_address', 'message', 'admin_request']);
		if ($bddPush===false) {
            throw new BDDCreationException();
        }
		// Redirect Profile Page.
        $this->redirect('');
	}

	//Set to protecte or private when working.
	public function MailRetrieve()
	{
		$aRoleUser=$this->session->get('user')->getListRole();
		if(in_array( "ROLE_GOD", $aRoleUser)){
			$mailList = $this->HomeManager->GetMailsForGod();
		}
		$this->addParam("mailList", $mailList);

		$this->view("mails");
	}
}
