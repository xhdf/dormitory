<?php

require_once 'database_inc.php';
session_start();
$user = $_SESSION['user'];
$uid=$_SESSION['id'];
$dor_id=$database->select('users','dormitoryId',array('id'=>$uid));

//保存报修记录
$database->insert('repair', ['content' => $content, 'phone' => $phone, 'create_time' => $create_time,'dormitoryId'=>$dor_id[0]]);
