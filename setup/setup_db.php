<?php
// script for create data base 

## get main number of config db

// user permissions
$table = array(
    'table' => 'auth_group',
    'elements' => array(
        'code' => 'text:NN:n:true:true:Code',
        'name' => 'text:NN:n:true:true:Name',
    ),
);
$sql->create_table_array($table);

$table = array(
    'table' => 'auth_group_permissions',
    'elements' => array(
        'group_ref' => 'number:NN:n:true:true:Code',
        'permission_ref' => 'number:NN:n:true:true:Name',
    ),
);
$sql->create_table_array($table);

$table = array(
    'table' => 'auth_permissions',
    'elements' => array(
        'code' => 'text:NN:n:true:true:Code',
        'name' => 'text:NN:n:true:true:Name',
    ),
);

$sql->create_table_array($table);


// user
$user_table = array(
    'table' => 'auth_user',
    'elements' => array(
        'password' => 'text:NN:n:true:true:Password',
        'last_login' => 'text:NN:n:true:true:last_login',
        'date_joined' => 'text:NN:n:true:true:last_login',
        'is_superuser' => 'text:NN:n:true:true:is_superuser',

        'first_name' => 'text:NN:n:true:true:Name',
        'last_name' => 'text:NN:n:true:true:Name Last',

        'username' => 'text:NN:n:true:true:Username',
        'email' => 'text:NN:n:true:true:email',

        'is_staff' => 'text:NN:n:true:true:is_staff',
        'is_active' => 'text:NN:n:true:true:is_active',
    ),
);
$sql->create_table_array($user_table);


$table_ref = array(
    'table' => 'auth_user_group',
    'elements' => array(
        'user_ref' => 'number:NN:n:true:true:ref_',
        'group_ref' => 'number:NN:n:true:true:ref_',
    ),
);
$sql->create_table_array($table_ref);

$table_ref = array(
    'table' => 'auth_user_permission',
    'elements' => array(
        'user_ref' => 'number:NN:n:true:true:ref_',
        'permission_ref' => 'number:NN:n:true:true:ref_',
    ),
);
$sql->create_table_array($table_ref);



$table_ref = array(
    'table' => 'auth_user_sessions',
    'elements' => array(
        'sk_2' => 'text:NN:n:true:true:ref_',
        'user_id' => 'number:NN:n:true:true:ref_',
        'date_creation' => 'text:NN:n:true:true:ref_',
        'last_use' => 'text:NN:n:true:true:ref_',
    ),
);
$sql->create_table_array($table_ref);