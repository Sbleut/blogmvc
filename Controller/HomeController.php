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

	public function MailCreate()
		{
			
		}
}