<?php

class UserController extends BaseController
{
    /**
     * Login function : Displays the login page
     *
     * @return void
     */
    public function Login()
    {
        $this->View("login");
    }

    /**
     * Signup function : Displays the signup page
     *
     * @return void
     */
    public function Signup()
    {
        $this->View("signup");
    }

    /**
     * Logout function : Destroys the session and displays the login page.
     *
     * @return void
     */
    public function Logout()
    {
        $this->session->delete('user');
        $this->session->destroy();
        $this->view("login");
    }

    /**
     * UserRetrieve function : Displays the Profil page
     *
     * @return void
     */
    public function UserRetrieve()
    {
        $this->checkLoggedIn();
        $user=$this->session->get('user');
        $this->addParam("user", $user);
        $this->view("profil");
    }

    /**
     * Authenticate function takes a login and a password and tries to authenticate the user.
     * If the login is an email, it gets the user from the database using the UserManager, 
     * then checks if the provided password matches the user's password.
     * If the authentication is successful, the user is stored in the session and redirected to the home page.
     * If the login is not an email, throws a NotAnEmail exception.
     * If the user does not exist in the database, throws a WrongLoginException.
     *
     * @param [string] $login
     * @param [string] $password
     * 
     * @throws WrongLoginException
     * @throws NotAnEmail
     * 
     * @return void
     */
    public function Authenticate($login, $password)
    {
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $user = $this->UserManager->getByMail($login);
            if (empty($user)) {
                throw new WrongLoginException();
                return;
            }
            // WARNING Need to hash password before pushing to prod
            if (password_verify($password, $user->getPassword())) {
                foreach ($this->UserManager->getRole($user->getId()) as $role) {
                    $listRole[] = $role['name'];
                }
                $user->setListRole($listRole);                
                $this->session->set('user', $user);
                $this->redirect('/');
            }
        }
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            throw new NotAnEmail();
        }
    }

    /**
     * Register is a function to handle user registration with given parameters.
     *
     * @param [string] $login User email as login
     * @param [string] $password User password
     * @param [string] $checkPassword Password confirmation
     * @param [string] $name User first name
     * @param [string] $lastName User last name
     * @param [string] $catchPhrase User catch phrase
     *
     * @throws WrongTypeOfFile Exception if file type is not .png or .jpeg
     * @throws PictureTooBig Exception if file size is too big
     * @throws BDDCreationException Exception if database creation fails
     *
     * @return void
     */
    public function Register($login, $password, $checkPasword,  $name, $lastName, $catchPhrase)
    {
        //Check if we can user an object as a parameter 

        // Checking User Form
        $bMailPassword = false;
        // Password == checkpaswword
        // login == email
        if (filter_var($login, FILTER_VALIDATE_EMAIL) && $password == $checkPasword) {
            $bMailPassword = true;
        }
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/', $password);

        // PictureManagement
        $pic = $_FILES['profile-pic'] ?? null;
        $bPicOk = true;
        if ($pic['type'] != 'image/png' && $pic['type'] != 'image/jpeg') {
            $bPicOk = false;
            throw new WrongTypeOfFile();
        }
        // Picture max weight => Redirect Error
        if ($pic['size'] > 5000000) {
            $bPicOk = false;
            throw new PictureTooBig();
        }

        // Path to files New Folder 
        $uploadDir = 'uploads/';
        $extension = pathinfo($pic['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $extension;
        $destination = $uploadDir . $newFileName;
        if (move_uploaded_file($pic['tmp_name'], $destination)) {
            $picPath = $destination;
        } else {
            throw new Exception('Failed to upload file');
        }

        // Preparing Array to use BaseManager::create($obj, $param)
        // Calling UserManager::createUser()
        $user = new User();
        $user->populate($id = null, $login, $hashedPassword, $name, $lastName, $picPath, $catchPhrase);
        $result = $this->UserManager->create($user, ['mail', 'password', 'name', 'last_name', 'pic', 'catch_phrase']);
        if (!$result) {
            throw new BDDCreationException();
        }
        $user = $this->UserManager->getByMail($login);
        if (!$user) {
            // User does not exist, handle the error appropriately
            throw new Exception('User does not exist');
        }
        $this->UserManager->setBasicRole($user->getId());
        // Redirect Profile Page.
        $this->Authenticate($login, $password); 
    }
}
