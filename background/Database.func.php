<?php
require_once 'libs/medoo.php';

function Database()
{
    $database = new medoo([
        // 必须配置项
        'database_type' => 'mysql',
        'database_name' => 'ssglxt',
        'server' => '127.0.0.1',
        'username' => 'root',
        'password' => 'doryu',
        'charset' => 'utf8']);
    return $database;
}
