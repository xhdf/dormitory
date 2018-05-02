<?php
require_once 'database_inc.php';

session_start();
$title = $_POST['title'];
$content = $_POST['content'];
$state = $_POST['state'];
$user = $_SESSION['user'];
$uid=$_SESSION['id'];
//$user = 'test';
if($database->insert('notice', ['title' => $title, 'content' => $content, 'state' => $state, 'name' => $user,'userId'=>$uid])){
    echo 1;
}
else{
    echo 0;
}