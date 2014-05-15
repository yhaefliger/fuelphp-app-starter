#FuelPHP 1.7 Starter App

This is a just a starter FuelPHP 1.7 application.
It will give you the basic mvc structure for a web application with frontend and backend.
Two separates themes (public and admin both based on Bootstrap 3), auth (simpleauth), basic users management + registration.

I created this as a starter kit when I want to quickly prototype a web app on a local dev environement (public files have been moved to root folder for easier access without needing to create virtual host on local, but this is not recommended for live web app).

I think this is a good start point for person who are interested in developping with PHP framework and want some pratical examples to start with.


##Installation

Download this repository Download this repository [zip archive](https://github.com/yhaefliger/fuelphp-app-starter/archive/master.zip) or from github clone. or from github clone.

if you're on a linux/mac system check the permissions on folders:
``` 
php oil refine install
    Made writable: APPPATH/cache
    Made writable: APPPATH/logs
    Made writable: APPPATH/tmp
    Made writable: APPPATH/config
```

configure your db settings in `fuel/app/config/development/db.php`

also make sure to put new random salts in `fuel/app/config/auth.php` and `fuel/app/config/simpleauth.php`

##DB Structure + Admin

###If you have access to php from your command line (recommanded) 

In the root of your application launch from terminal:
```
php oil migrate
```

then to create the admin

```
php oil console

Auth::create_user('admin', 'password', 'admin@test.com', 100); 
```

of course change admin with your admin username, password and email as you want.

###If you don't have access to php from command line

You can still install DB structure from the sql file in the `sql` folder.
Then you will need to add a temp action in the controller that will create the first user, because passwords are encrypted with your new salt it cant be created directly from mysql.

In your `/fuel/app/classes/controller/special.php` class add the function:

```
public function action_install(){
    echo Auth::create_user('admin', 'password', 'admin@test.com', 100);
    die();
}
```

Like from command line change admin by your desired username, password and email.

Call it from `http://path-to-your-app/special/install`, it should display `1`. If so **REMOVE THIS ACTION FROM YOUR CONTROLLER**.



More to be done ;)...
