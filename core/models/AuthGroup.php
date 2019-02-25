<?php
namespace xeki_auth;

/**
 * Class auth-module
 * @package xeki_auth
 * version 1
 */

class Group
{
    public $id;
    public $code;
    public $name;


    private $sql;
    function __construct($local_config)
    {
        $this->sql = \xeki\module_manager::import_module('db-sql',$local_config['db_config']);
    }

    function load_code($code){
        $query="select * from auth_group where code='{$code}'";
        $group = $this->sql->query($query);
        $group = $group[0];
        $this->id = $group['id'];
        $this->code = $group['code'];
        $this->name =$group['name'];
    }
    function load_id($id){
        $query="select * from auth_group where id='{$id}'";

        $group = $this->sql->query($query);
        $group = $group[0];

        $this->id = $group['id'];
        $this->code = $group['code'];
        $this->name =$group['name'];
    }







}