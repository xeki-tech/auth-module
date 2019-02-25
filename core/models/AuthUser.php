<?php
namespace xeki_auth;

/**
 * Class auth-module
 * @package xeki_auth
 * version 1
 */

class User
{
    public $id;
    public $user_identifier;
    public $array_info;



    private $sql;
    private $encryption_method = "sha256";

    function __construct($local_config)
    {
        $this->sql = \xeki\module_manager::import_module('db-sql',$local_config['db_config']);
        $this->encryption_method = $local_config['encryption_method'];
    }

    function load_by_id($id){
        $query="select * from auth_auth where id='{$id}'";
        $user = $this->sql->query($query);
        $user = $user[0];
        $this->id = $user['id'];
        $this->array_info = $user;
    }
    function load_by_identifier($user_identifier){
        $query="select * from auth_auth where {$this->user_identifier}='{$user_identifier}'";
        $user = $this->sql->query($query);
        $user = $user[0];
        $this->id = $user['id'];
        $this->user_identifier = $user[$this->user_identifier];
        $this->array_info = $user;
    }

    public function load_info($info)
    {
        $this->id = $info['id'];
        $this->user_identifier = $info[$this->user_identifier];
        $this->array_info = $info;

    }

    public function load_groups_permissions()
    {

    }

    public function get($info)
    {
        $array_info = $this->array_info;
        return isset($array_info[$info])?$array_info[$info]:false;

    }

    public function get_info()
    {
        return $this->array_info;
    }

    public function set($field,$value)
    {
        $value = $this->sql->sanitize($value);
        $data = [
          $field => $value
        ];
        d(" id = {$this->id} ");
        $res = $this->sql->update("auth_user",$data," id = {$this->id} ");
        d($this->sql->error());
        return $res;

    }

    public function update($array)
    {
        return $this->sql->update("auth_user",$array," id = {$this->id}");

    }

    public function set_password($password)
    {
        $password = hash($this->encryption_method, $password);
        return $this->set_password_encrypted($password);

    }
    public function set_password_encrypted($password)
    {
        $password = hash($this->encryption_method, $password);
        $data = [
            "password" => $password
        ];
        return $this->sql->update("auth_user",$data," id = {$this->id}");

    }
}