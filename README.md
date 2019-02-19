# Auth Module 

### Vars 
id_user
email
username
phone 

password

first_name
last_name

list[]


## Methods Auth


### Create User

Create user 
create_user($array);
$array need the user_identifier field, email for 
```
$info_create =[
    'email'=>'email@email.com',
    'password'=>'123qweasd',
    //
    'some_extra_data'=>'data',
    'some_extra_data_1'=>'data',
    'some_extra_data_2'=>'data',

];
create_user( $info_create );
```


### Login

```
login("user_identifier","password");
login("user_identifier","password",false);

login_redirect("user_identifier","password",true);
```


### Login required
```
login_required();
login_required('page-to-redirect');
```

### Login status
```
login_status();
```

### Get info
```
login_status();
```

### User exist 
```
user_exist("user_identifier");
```


## USER 
### Get user 
```
$usr = get_user();
```

### Get info array 
```
$array = $user->get_info();

$array["lastname"];
```

### Get info 
```
$user->get_("lastname");
```

### Get field user 
```
$user->get("lastname");
```

### Update user 
```
    $array = [
        'lastname'=>'My last name'
    ];
    $user->update("lastname");
```
### update field user 

$user->set("lastname","My last name");

### update password user 

false = raw password ( default )
true = pre encrypted password
```
    $user->set_password("password", true);
```


