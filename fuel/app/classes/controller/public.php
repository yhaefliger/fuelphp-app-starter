<?php
/**
 * FuelPHP App Starter
 * 
 * Public Controller
 * Shared functions for all public controllers
 *
 * @package    FuelAppStarter
 * @extends	   Controller_Base
 * @version    0.1
 * @author     YHA
 * @license    MIT License
 * @link	   https://github.com/yhaefliger/fuelphp-app-starter
 */

class Controller_Public extends Controller_Base
{
    /**
     * set the default layout for public theme
     */
    public function before()
    {
		parent::before();
		
        // load the theme template
        $this->theme->set_template('layouts/default');
		
	}
}
?>