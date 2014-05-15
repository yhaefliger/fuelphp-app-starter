<?php
/**
 * FuelPHP App Starter
 * 
 * Admin Controller
 * Shared functions for all admin controllers
 *
 * @package		FuelAppStarter
 * @extends		Controller_Base
 * @version		0.1
 * @author		YHA
 * @license		MIT License
 * @link		https://github.com/yhaefliger/fuelphp-app-starter
 */

class Controller_Admin extends Controller_Base
{
    /**
     * set the default layout for admin theme
	 * check the user is logged in and has sufficiant rights to access admin controllers
     */
    public function before()
    {
		parent::before();
		
		//Check user is logged in and is admin except for the login action of course 
		if((!Auth::check() || !Auth::member(100)) && Request::active()->action != 'login') {
			Response::redirect('admin/login');
		}
		
		//set the active theme to admin
		$this->theme->active('admin');
		
        //set the admin theme template
        $this->theme->set_template('layouts/default');
		
	}
	
	/**
	 * Admin Dashboard 
	 */
	public function action_index() {
		
		//set top menu active state on dashboard
		$this->theme->get_template()->set('selected_menu', 'dashboard');
		
		$this->theme->get_template()->set('title', 'Admin Dashboard');
		$this->theme->set_partial('content', 'dashboard');
	}
	
	/**
	 * Login to admin
	 */
	public function action_login() {
		if (Input::post())
		{
			// Check the credentials. This assumes that you have the previous table created and
			// you have used the table definition and configuration as mentioned above.
			if (Auth::login())
			{
				Session::set_flash('success', 'Welcome '.Auth::get_screen_name());
				// Credentials ok, go right in.
				Response::redirect('admin');
			}
			else
			{
				Session::set_flash('login_error', 'Wrong username/password combo.');
			}
		}
		
		$this->theme->set_template('layouts/login');
	}
}
?>