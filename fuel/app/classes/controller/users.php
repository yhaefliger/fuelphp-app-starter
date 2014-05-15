<?php
/**
 * Users Public Controller
 *
 * Login/Logout/Register and user specifics page (Profil for example)
 *
 * @package  FuelAppStarter
 * @extends  Controller_Public
 */
class Controller_Users extends Controller_Public
{
	/**
	 * Check the user is logged in before accessing any of the action 
	 */
	public function before() {
		parent::before();
		
		if(!Auth::check() && Request::active()->action != 'login' && Request::active()->action != 'register' && Request::active()->action != 'logout'){
			Session::set_flash('error', 'Login first'); 
			Response::redirect(Router::get('login'));
		}
	}
	
	/**
	 * User Profile page 
	 */
	public function action_profile(){
		
		$this->theme->get_template()->set('title', 'Profile');
		$this->theme->set_partial('content', 'users/profile')->set('user', $this->current_user);
	}
	
	
	/**
	 * User frontend login
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
				Response::redirect('profile');
			}
			else
			{
				Session::set_flash('error', 'Wrong username/password combo. Try again');
			}
		}
		
		$this->theme->get_template()->set('title', 'Login');
		$this->theme->set_partial('content', 'users/login');
	}
	
	/**
	 * User Registration
	 */
	public function action_register() {
		$val = Model_User::validate('user');
		
		if(Input::post())
		{
			if($val->run(Input::post())){
				//try create user
				$user_id = false;
				try{
					$username = Input::post('username', '');
					$email = Input::post('email', '');
					$group = 1; //Default user
					$password = Input::post('password', '');
					$user_id = Auth::create_user($username, $password, $email, $group);
				}catch(Exception $e){
					Session::set_flash('error', $e->getMessage());
				}
				
				//user created from auth package
				if($user_id){
					//retrieve user orm model and add profile
					$user = Model_User::find($user_id);
					if($user){
						$user->profile = Model_User_Profile::forge(array(
							'firstname' => Input::post('firstname', ''),
							'lastname' => Input::post('lastname', ''),
						));
						$user->save();
					}
					
					//login to newly created account and redirect to user profile
					Auth::login($username, $password);
					Session::set_flash('success', 'Your account has been created');
					Response::redirect(Router::get('profile'));
				}
			}
		}
			
		$this->theme->get_template()->set('title', 'Register');
		$this->theme->set_partial('content', 'users/register')->set('val', $val);
	}
	
			
	/**
	 * User logout
	 */
	public function action_logout() 
	{
		//perform logout
		Auth::logout();
		
		//redirect to homepage
		Response::redirect('/');
	}
}
