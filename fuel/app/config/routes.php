<?php
return array(
	'_root_'  => 'special/homepage',							// The default route
	'_404_'   => 'special/404',									// The main 404 route
	
	'logout' => array('users/logout', 'name' => 'logout'),	//Logout
	'login' => array('users/login', 'name' => 'login'),		//Login
	'register' => array('users/register', 'name' => 'register'), //User Register
	'profile' => array('users/profile', 'name' => 'profile'),
);