<?php
require_once 'database_inc.php';

if($database->update('message', ['up[+]' => 1], ['id' => $_GET['id']])){
    $up = $database->select('message', 'up', ['id' => $_GET['id']]);
    echo $up[0];
}
else{
    echo 'erro';
}