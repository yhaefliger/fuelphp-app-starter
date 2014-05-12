<?php
/**
 * FuelPHP App Starter
 * 
 * Base Controller
 * Shared functions for both public and admin controllers
 *
 * @package    FuelAppStarter
 * @extends	   Controller
 * @version    0.1
 * @author     YHA
 * @license    MIT License
 * @link	   https://github.com/yhaefliger/fuelphp-app-starter
 */

class Controller_Base extends Controller
{
    /**
     * load the theme template, set the page title and the menu's
     */
    public function before()
    {
        // load the theme template
        $this->theme = Theme::instance();

	}
	
    /**
     * keep the after() as standard as possible to allow custom responses from actions
     */
    public function after($response)
    {
        // If no response object was returned by the action,
        if (empty($response) or  ! $response instanceof Response)
        {
            // render the defined template
            $response = Response::forge(Theme::instance()->render());
        }

        return parent::after($response);
    }
}