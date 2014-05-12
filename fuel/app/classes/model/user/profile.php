<?php

class Model_User_Profile extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'firstname',
		'lastname',
		'created_at',
		'updated_at',
	);
	
	//Relations
	protected static $_belongs_to = array(
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		)
	);
	
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'user_profiles';

}
