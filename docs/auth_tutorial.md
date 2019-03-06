# How use   

## Dowload module 

Clone the following repository: xeki-framework/auth-module
[SSH](git@github.com:xeki-framework/auth-module.git) -
[HTTPS](https://github.com/xeki-framework/auth-module.git)
in the /modules folder.

## Run initial command
```
index.php install xeki_auth
```

## Setup DataBase
Configure the database in the following path: /core/modules_config/db-sql/config.php 
```
$MODULE_DATA_CONFIG = array(
    "main" => array(
        "host" => "host",
        "user" => "user",
        "pass" => "password",
        "db"   => "database",
    )
);
```

You can configure a secondary database, example:

```
$MODULE_DATA_CONFIG = array(
    "main" => array(
        "host" => "host",
        "user" => "user",
        "pass" => "password",
        "db"   => "database",
    ),
    "secondary" => array(
        "host" => "host",
        "user" => "user",
        "pass" => "password",
        "db"   => "database",
    )
);
```

## Create login page
To create a login page you need to create your view, which will render the form that will capture the data
<br>  
pages/login.php
```
<form method="POST">
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="email" name="email"/>
        
    </div>
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" class="form-control" name="pw" placeholder="password" />
    </div>
    <div class="form-group">
        <input type="submit" value="Login" class="btn center login_btn" />
    </div>
    <input type="hidden" value="auth::login" name="xeki_action" />
</form>
```

At this point you can capture the data in two ways:
<br>


### Handling the data (Option #1): action_method
In the file action_methods.php will import the module auth, and will use the data sent by the form to login

```
\xeki\routes::action('auth::login', function(){
    $auth = \xeki\module_manager::import_module('auth');
    $user = $auth->login($_POST['email'],$_POST['pw']);
    d($user->get_info());
});
```

### Handling the data (Option #2): url > controller
To use the data from a controller it is necessary to define the action in the form, and that same value will go in the file url.php

```
...
<form method="POST" action="url_value">
...
```

```
url.php: 

\xeki\routes::post('url_value', function($vars){
    $auth = \xeki\module_manager::import_module('auth');
    $user = $auth->login($_POST['email'],$_POST['pw']);
    d($user->get_info());
    if(\xeki\core::is_error($user)) {
        if($user->code == "invalid_pass"){/* ok!! */}
        else{
            d("08: Error ".$name_test);die();
        }
    }
});
```


## Create logout page
To close the user session you only need a button that directs to /logout
Example: < a href="{{URL_BASE}}logout" > Logout </ a >
<br>
This will redirect automatically to the url logout defined in the file url.php
<br>
```
\xeki\routes::any('logout', function(){
    $auth = \xeki\module_manager::import_module('auth');
    $auth->logout();
    \xeki\core::redirect('');
});
```
## Validate logged user restricted pages


## Get info user 

## Set global info for html
 
