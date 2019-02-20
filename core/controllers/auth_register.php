<?php
/**
 * Created by PhpStorm.
 * User: liusp
 * Date: 4/10/2016
 * Time: 6:13 PM
 */

//echo "hi!!";
//$sql = \xeki\module_manager::import_module('xeki_db_sql', 'main');

//d($sql->query("SELECT now()"));
//
//d($AG_MODULES);
// d($AG_HTML);
//d($AG_MODULES);
$array_data = array();

$auth_module = \xeki\module_manager::import_module('xeki_auth');
$auth_module->pageLoginCheck();



$folder_auth=$auth_module->get_folder();
$array_data['xeki_auth_temp_check_user']=isset($_SESSION['xeki_auth::temp_check_user'])?$_SESSION['xeki_auth::temp_check_user']:"";
\xeki\html_manager::render("{$folder_auth}/auth_register.html", $array_data);