<?php

// 1) List of Admin Funnction()

// 2) Rights verification

class AdminController extends BaseController
{
    public function Dashboard()
    {
        $this->view('admin');
    }

    // private function isAdmin()
    // {
    //     if(isset($_SESSION['user]']) && in_array('ROLE_ADMIN', $_SESSION['user']['roles']));
    // }
}

?>