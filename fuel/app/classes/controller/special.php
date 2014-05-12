<?php
/**
 * Special Controller
 *
 * Public Homepage and 404 actions
 *
 * @package  FuelAppStarter
 * @extends  Controller_Public
 */
class Controller_Special extends Controller_Public
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_homepage()
	{
		$this->theme->get_template()->set('title', 'Welcome');
		$this->theme->set_partial('content', 'special/homepage');
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		$this->theme->get_template()->set('title', '404 - Not Found');
		$this->theme->set_partial('content', 'special/404');
	}
}
