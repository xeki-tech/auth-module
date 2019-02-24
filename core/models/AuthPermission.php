<?php
namespace xeki_auth;

/**
 * Class php-auth-module
 * @package xeki_auth
 * version 1
 */

class AuthPermission
{
    public $id;
    public $code;
    public $name;


    private $sql;
    function __construct($db_config)
    {
        $this->sql = \xeki\module_manager::import_module('db-sql',$db_config);
    }


    function load_id($id){
        $query="select * from auth_permissions where id='{$id}'";
        $permission = $this->sql->query($query);
        $permission = $permission[0];
        $this->id = $permission['id'];
        $this->code = $permission['code'];
        $this->name =$permission['name'];

    }

    function load_code($code){
        $query="select * from auth_permissions where code='{$code}'";
        $permission = $this->sql->query($query);
        $permission = $permission[0];
        $this->id = $permission['id'];
        $this->code = $permission['code'];
        $this->name =$permission['name'];

    }






}