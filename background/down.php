<?php
require_once 'database_inc.php';

if($database->update('message', ['down[+]' => 1], ['id' => $_GET['id']])){
    $down = $database->select('message', 'down', ['id' => $_GET['id']]);
    echo $down[0];
}
else{
    echo 'erro';
}