<?php
require_once 'database_inc.php';
session_start();

if(empty($_GET['table']) || empty($_GET['id'])){
    $arr['result'] = 0;
    $arr['mes'] = '参数错误';
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);  //将数组和对象，转换为json格式
    return false;
}

$table = $_GET['table'];
$id = intval($_GET['id']);
$s = array();
switch ($table){
    case 'grade':
        $s = ['points' => $_GET['points'], 'weekly' => $_GET['weekly']];
        break;
    case 'message':
        $s = ['answer' => $_GET['answer']];
        break;
    case 'users':
        if(!empty($_GET['no'])){
            if(!empty($_GET['username'])){
                $s['username'] = $_GET['username'];
            }
            if(!empty($_GET['class'])){
                $s['class'] = $_GET['class'];
            }
            if(!empty($_GET['dates'])){
                $s['dates'] = $_GET['dates'];
            }
            if(!empty($_GET['sex'])){
                $s['sex'] = $_GET['sex'];
            }
            if(!empty($_GET['department'])){
                $s['department'] = $_GET['department'];
            }
            if(!empty($_GET['dormitory'])){
                // $dormitory = $_GET['dormitory'];
                $dormitory=$database->select('dormitory', 'id', ['dor_num' => $_GET['dormitory']]);
                // var_dump($dormitory);
                $s['dormitoryId']=intval($dormitory[0]);
                // var_dump($s['dormitoryId']);
            }
            if(!empty($_GET['power'])){
                $s['power'] = $_GET['power'];
                // if($_GET['power'] >= 1 ){
                //     if($_SESSION['power'] < 3 ){
                //         $arr['result'] = 0;
                //         $arr['mes'] = '你不是最高管理员';
                //         echo json_encode($arr,JSON_UNESCAPED_UNICODE);
                //         exit();
                //     }
                // }
            }
        }
        else {
            $s = ['password' =>'123456'];
        }
        break;
    case 'repair':
        $repair_time = date("Y-m-d");
        $s = ['yon' => 1, 'repair_time' => $repair_time];
        break;
    case 'cost':
        $s = ['state' => 1];
        break;
    default:
        break;
}

// var_dump($s);
if($database->update($table, $s, ['id' => $id])){
    $arr['result'] = 1;
}else{
    $arr['result'] = 0;
    $arr['mes'] = '操作失败';
}
//print_r($s);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);