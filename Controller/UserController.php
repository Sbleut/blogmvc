<?php

class UserController extends BaseController
{
    public function Login()
    {
        $this->View("login");
    }

    public function Authenticate($login, $password)
    {
        if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $login))
        {
            $user = $this->UserManager->getByMail($login);
            if(is_null($user))
            {
                throw new WrongLoginException();
            }
        }
        else
        {
            throw new NotAnEmail();
        }
        
        if($user->getPassword() == $password)
        {
            $_SESSION['user'] = $user;
            $this->redirect('/');
        }
        
    }
}
