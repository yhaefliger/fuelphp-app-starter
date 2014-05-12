<?php
/**
 * FuelPHP App Starter
 * 
 * Admin Controller
 * Shared functions for all admin controllers
 *
 * @package    FuelAppStarter
 * @extends	   Controller_Base
 * @version    0.1
 * @author     YHA
 * @license    MIT License
 * @link	   https://github.com/yhaefliger/fuelphp-app-starter
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
		
		//set the active theme to admin
		$this->theme->active('admin');
		
        //set the admin theme template
        $this->theme->set_template('layouts/default');
		
		//TODO IMPLEMENT SIMPLEAUTH AND CHECK USER IS ADMIN
	}
	
	/**
	 * Admin Dashboard 
	 */
	public function action_index() {
		$this->theme->get_template()->set('title', 'Admin Dashboard');
		$this->theme->set_partial('content', 'dashboard');
	}
}
?>