<?php

$MODULE_DATA_CONFIG = array(
    "main" => array(
        /*
         * Encryption method hash
         * default sha256s
         * */
        "encryption_method" => "sha256",

        /*
         * db-sql config
         * default main
         * */
        "db_config" => "main",

        /*
        * field db for user login
        * default main
        * */
        "field_identifier" => "email",
        "extra_fields_user"=>[
            'first_name_2'  => [
                'type_field'=>'text',
                'null'=>'allow', // allow, not_allow
            ],
            'last_name_2'  => [
                'type_field'=>'text',
                'null'=>'allow', // allow, not_allow
            ],
            'n_id'  => [
                'type_field'=>'text',
                'null'=>'allow', // allow, not_allow
            ],
//            'n_id_'  => [
//                'type_field'=>'text',
//                'null'=>'allow', // allow, not_allow
//            ],
        ],
    ),
//    "secondary" => array(
//    ),
);