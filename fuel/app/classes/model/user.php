<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at'
	);
	
	//Relations
	protected static $_has_one = array(
		'profile' => array(
			'key_from' => 'id',
			'model_to' => 'Model_User_Profile',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		)
	);
	
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('email', 'Email', 'required|max_length[255]');
		$val->add_field('username', 'Username', 'required|max_length[255]');
		$val->add_field('password', 'Password', 'required');

		return $val;
	}
	
	/**
	* Retrieve user full name (firstname + lastname)
	* 
	* @access public
	* @return string name or empty if no profile
	*/
	public function get_full_name()
	{
		$name = '';
		
		if($this->profile){
			$name = $this->profile->firstname.' '.$this->profile->lastname;
		}
		
		return $name;
	}
}