<?php

require_once 'database_inc.php';
session_start();
date_default_timezone_set('PRC');//中国

$user = $_SESSION['user'];
$create_time = date("Y-m-d");

$uid=$_SESSION['id'];
$dor_id=$database->select('users','dormitoryId',array('id'=>$uid));
//保存报修记录
if(empty($_GET['id'])){
    $phone = $_POST['phone'];
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    // $dormitory = filter_input(INPUT_POST, 'dormitory');
    if($database->insert('repair', ['content' => $content, 'phone' => $phone, 'create_time' => $create_time,'dormitoryId'=>$dor_id[0]])){
        echo 1;
    }
    else{
        echo '提交失败';
    }
  
}
//print_r($_POST);


else {
    //保存留言
    if ($_GET['id'] == 2) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        // $phone = $_POST['phone'];
        if ($database->insert('message', ['username' => $user,'title' => $title, 'content' => $content, 'create_time' => $create_time])) {
            echo 1;
        } else {
            echo '提交失败';
        }
    }

    //保存留校信息
    if ($_GET['id'] == 5) {
        $phone = $_POST['phone'];
        // $dormitory =  $_POST['dormitory'];
        $username= $_POST['username'];
        $department= $_POST['department'];
        $stu_id=$database->select('stay','userId',array('userId'=>$uid));
        // var_dump( $stu_id);
        // foreach($stu_id as $sid){
            if(!empty($stu_id)){
                echo "你已经提交";
            }
            else{
                if($database->insert('stay', ['userId' => $uid,'phone' => $phone,'dormitoryId'=>$dor_id[0],'date'=>date('Y-m-d',time())])){
                    echo 1;
                }
                else{
                    echo '提交失败';
                }
            }
        // }
    }

    //保存晚归信息
    if ($_GET['id'] == 6) {
        $no = $_POST['no'];
        $stu_id=$database->select('users','*',array('no'=>$no));
        $time= $_POST['time'];
        // var_dump($no);
        if($database->insert('outlate', ['time' => $time,'userId'=>$stu_id[0]['id'],'dormitoryId'=>$stu_id[0]['dormitoryId']])){
            echo 1;
        }
        else{
            echo '提交失败';
        }
    }

    //保存公告
    //id=3保存公告,id=4保存草稿
    if($_GET['id'] == 3){
        $state = 0;
    }
    if($_GET['id'] == 4){
        $state = 1;
    }
    if(isset($state)) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $r = $database->select('notice', 'id', ['title' => $title]);
        if(!empty($r)){
            if($database->update('notice', ['title' => $title, 'content' => $content, 'state' => $state], ['id' => $r[0]])){
                echo 1;
                exit();
            }
            else{
                echo '修改失败';
                exit();
            }
        }
        else {
            if ($database->insert('notice', ['title' => $title, 'content' => $content, 'name' => $user, 'state' => $state])) {
                echo 1;
            } else {
                echo '提交失败';
            }
        }
    }

}

function a($str){
    return preg_match('/([0-9]{3})/',$str,$a) ? $a[0]: 0;
}