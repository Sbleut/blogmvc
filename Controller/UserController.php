<?php

class UserController extends BaseController
{
    public function Login()
    {
        $this->View("login");
    }

    public function Signup()
    {
        $this->View("signup");
    }

    public function Logout()
    {
        session_destroy();
        $this->view("login");
    }

    public function UserRetrieve()
    {
        $this->view("profil");
    }

    public function Authenticate($login, $password)
    {
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $user = $this->UserManager->getByMail($login);
            if (empty($user)) {
                throw new WrongLoginException();
                exit;
            }
            // WARNING Need to hash password before pushing to prod
            if ($user->getPassword() == $password) {
                $_SESSION['user'] = $user;
                foreach ($this->UserManager->getRole($user->getId()) as $role)
                {                    
                    $listRole[] = $role['name'];
                }
                $_SESSION['user']->setListRole($listRole);
                $this->redirect('/');
            }
        } else {
            throw new NotAnEmail();
        }
    }

    public function Register($login, $password, $checkPasword, $name, $lastName, $catchPhrase)
    {
        //Check if we can user an object as a parameter 

        // Checking User Form
        $bMailPassword = false;
        // Password == checkpaswword
        // login == email
        if (filter_var($login, FILTER_VALIDATE_EMAIL) && $password == $checkPasword)
        {   
            $bMailPassword = true;
        }

        // password requirements

        // preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/', $password);

        // PictureManagement
        $pic = $_FILES['profil-pic'];
        $bPicOk = true;
        // pic == jpeg or png
        if($pic['type'] != 'image/png' && $pic['type'] != 'image/jpeg')
        {
            $bPicOk = false;
            throw new WrongTypeOfFile();
        }
         // Picture max weight => Redirect Error
        if($pic['size'] > 500000)
        {
            $bPicOk = false;
            throw new PictureTooBig();
        }     
        // Path to files New Folder 
        $uploadDir = 'uploads/';
        $extension = pathinfo($pic['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid().'.'.$extension;
        $destination = $uploadDir . $newFileName;
        if (move_uploaded_file($pic['tmp_name'], $destination)) {
            $picPath = $destination;
        } else {
            throw new Exception('Failed to upload file');
        }
        
        // Preparing Array to use BaseManager::create($obj, $param)
        // Calling UserManager::createUser()
        $user = new User();
        $user->populate($id = null, $login, $password, $name, $lastName, $picPath, $catchPhrase);
        $result = $this->UserManager->create($user, ['mail', 'password', 'name', 'last_name', 'pic', 'catch_phrase']);
        if(!$result)
        {
            throw new BDDCreationException();
        }
        // Redirect Profile Page.
        $this->redirect('');
    }
}
?>