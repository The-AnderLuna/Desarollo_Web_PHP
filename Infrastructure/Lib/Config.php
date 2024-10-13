<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/php-activerecord/ActiveRecord.php";

$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"] . '/Proyecto_Web_PHP_/Infrastructure/Databases/Entities');
$cfg->set_connections([
    'development' => 'mysql://root:@localhost/desarrollo_web'
    //, 
    // 'test'   => 'mysql://username:password@localhost/test_database_name',
    // 'production' => 'mysql://username:password@localhost/production_databases_name',
]);
$cfg->set_default_connection('development');
