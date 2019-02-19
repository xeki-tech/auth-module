<?php
/**
 * Created by PhpStorm.
 * User: liusp
 * Date: 4/10/2016
 * Time: 6:13 PM
 */

//echo "hi!!";
$sql = \xeki\module_manager::import_module('xeki_db_sql', 'main');
$xeki_auth = \xeki\module_manager::import_module('xeki_auth', 'main');

//d($sql->query("SELECT now()"));
//
//d($AG_MODULES);
//d($AG_HTML);
//d($AG_MODULES);
$array_data = array();
//d($AG_PARAMS);
//d(count($AG_PARAMS));
$parms = \xeki\routes::$vars;
if(isset($parms['code'])){
    // confirm
    $query="SELECT * FROM user where confirm_code='{$parms['code']}'";
    $res = $sql->query($query);
    if(count($res)>0){
        // update
        $res=$res[0];
//        d($res);
        $data= array(
            "confirm_code"=>"",
            "activated"=>"on",
        );
        $sql->update("user",$data," id = '{$res['id']}' ");
        $popUp =  \xeki\module_manager::import_module('xeki_popup');
        $popUp->add_msg("Usuario activado");
        \xeki\core::redirect($xeki_auth->logged_page);
    }
    else{
        // popup
        // redirect to home
    }

}
else{
    // check if is logged
    $user_zone = \xeki\module_manager::import_module('xeki_auth');
    $folder_auth=$user_zone->get_folder();
    \xeki\html_manager::render("{$folder_auth}/auth_confirm_account.html", $array_data);
}
//

