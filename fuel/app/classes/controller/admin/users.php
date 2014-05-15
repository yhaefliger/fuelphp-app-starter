<?php
/**
 * Admin Users Controller
 *
 * Manaage Users from admin
 *
 * @package  FuelAppStarter
 * @extends  Controller_Admin
 */
class Controller_Admin_Users extends \Controller_Admin {

	/**
	 * Controller before
	 */
	public function before() {
		parent::before();
		
		$this->theme->get_template()->set('selected_menu', 'users');
	}
	
	
	/**
	 * List all users
	 */
	public function action_index() {
		$users = Model_User::query();
		
		$total = $users->count();
		
		//Apply filters
		$username = Input::get('username', '');
		if($username != ''){
			$users->where('username', 'like', '%'.$username.'%');
		}
		$email = Input::get('email', '');
		if($email != ''){
			$users->where('email', 'like', '%'.$email.'%');
		}
		$group = Input::get('group', '');
		if($group != ''){
			$users->where('group', $group);
		}
		
		//Pagination Config
		$config = array(
			'total_items' => $users->count(),
			'per_page' => 25,
			'uri_segment' => 'page',
		);
		
		//Pagination forge
		$pagination = Pagination::forge('users_pagination', $config);
		
		$users = $users
			->rows_limit($pagination->per_page)
			->rows_offset($pagination->offset)
			->get();

		$this->theme->set_partial('content', 'users/index')->set('users', $users)->set('total', $total)->set('pagination', $pagination);
	}
	
	/**
	 * View client profile from admin
	 * @param int $id user id
	 */
	public function action_view($id) {
		$user = Model_User::find($id);
		if(!$user){
			Session::set_flash('error', 'Invalid User');
			Response::redirect('admin/users');
		}
		
		$this->theme->set_partial('content', 'users/view')->set('user', $user);
	}
	
	/**
	 * Create a new user
	 */
	public function action_create() {

		//Post action
		if (Input::method() == 'POST') {
			$user_id = false;
			try{
				$username = Input::post('username', '');
				$email = Input::post('email', '');
				$group = Input::post('group', 1); //Default user
				$password = Input::post('password', '');
				$user_id = Auth::create_user($username, $password, $email, $group);
			}catch(Exception $e){
				Session::set_flash('error', $e->getMessage());
			}
			if($user_id){
				$user = Model_User::find($user_id);
				if($user){
					$user->profile = Model_User_Profile::forge(array(
						'firstname' => Input::post('firstname', ''),
						'lastname' => Input::post('lastname', ''),
					));
					if($user->save()){
						Session::set_flash('success', 'User successfullay created');
						Response::redirect('admin/users');
					}
				}
			}
		}

		$this->theme->set_partial('content', 'users/create');
	}
	
	/**
	 * Edit an user
	 * @param int $id user id
	 */
	public function action_edit($id) {
		//Retrieve user
		$user = Model_User::find($id);
		
		//Post action
		if (Input::method() == 'POST') {
			$error = false;
			
			//check unique username
			$username = Input::post('username', '');
			if($username != '' && $username != $user->username) {				
				//check username change is possible
				$exist = Model_User::query()->where('username', $username)->get_one();
				if($exist){
					$error = true;
					Session::set_flash('error', 'Username is already used');
				}else{
					$user->username = $username;
				}
			}
			//check unique email
			$email = Input::post('email', '');
			if(!$error && $email != '' && $email != $user->email){
				$exist = Model_User::query()->where('email', $email)->get_one();
				if($exist){
					$error = true;
					Session::set_flash('error', 'Email is already used');
				}else{
					$user->email = $email;
				}
			}
			
			if(!$error){
				$user->group = Input::post('group', $user->group);
				
				//new password ?
				$new_password = Input::post('new_password', '');
				if($new_password != ''){
					$user->password = Auth::hash_password($new_password);
				}
				
				//profile fields create or update
				//no user profile -> create it
				if(!$user->profile){
					$user->profile = Model_User_Profile::forge(array(
						'firstname' => Input::post('firstname', ''),
						'lastname' => Input::post('lastname', ''),
					));
				//update profile fields
				}else{
					$user->profile->firstname = Input::post('firstname', $user->profile->firstname);
					$user->profile->lastname = Input::post('lastname', $user->profile->lastname);
				}

				if($user->save()){
					Session::set_flash('success', 'User successfully updated');
					Response::redirect('admin/users/edit/'.$user->id);
				}else{
					Session::set_flash('error', 'Error updating user');
				}
			}
		}

		$this->theme->set_partial('content', 'users/edit')->set('user', $user);
	}

}