<?php
require_once 'smarty_inc.php';
require_once 'background/Pages.class.php';
require_once 'returntable.php';
session_start();

// 检测变量是否设置，并且不是 NULL。
if(!isset($_SESSION['power']) || $_SESSION['power'] != 0){
    header('location:login.php');
    return false;
}

$id = $_SESSION['id'];
$t = new returntable('users', '*', ['id' => $id], 1);
$user = $t->getArr();
// foreach ($user as $k => $val) {
$p0=new Pages('users','*',['id' => $id]);
// var_dump($user[0]['dormitoryId']);
    $dormitory=$p0->query("SELECT dor_num FROM dormitory WHERE  id=".$user[0]['dormitoryId']);
    $user[0]['dormitory']=$dormitory[0]['dor_num'];
// }
$smarty->assign('info', $user);
$active = 0;
//评分管理
if(!empty($_GET['page3'])){
    $page3 = $_GET['page3'];
    $active = $_GET['active'];
}
else{
    $page3 = 1;
}
$s3 = ['ORDER' => ['points'], 'LIMIT' => [($page3-1)*12,12]];
$c3 = array();
$h3 = 'location:?active=3';
if(!empty($_GET['week'])){
    $s3['AND']['weekly'] = $_GET['week'];
    $c3['AND']['weekly'] = $_GET['week'];
    $smarty->assign('week',$_GET['week']);
    $h3.= '&week='.$_GET['week'];
    $active = 3;
}
if(!empty($_GET['department']) ||  !empty($_GET['year']) ){
    $grade1=array();
    $active = 3;
}
if(!empty($_GET['search3'])){
    $search3 = $p0->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search3']);
    $s3['AND'] =['dormitoryId' => $search3['0']];
    $c3['AND'] =['dormitoryId' => $search3['0']];
    $active = 3;
    $smarty->assign('search3',$search3[0]);

}
$s3['AND']['id[!]'] = 0;
$c3['AND']['id[!]'] = 0;
$_SESSION['s3'] = $s3;
$p3 = new Pages('grade','*',$s3);
$count3 = $p3->count($c3);
$grade = $p3->select();
foreach ($grade as $k => $val) {
    $user=$p3->query("SELECT * FROM `users` WHERE id=".$val['userId']);
    $dormitory=$p3->query("SELECT * FROM `dormitory` WHERE id=".$val['dormitoryId']);
    $grade[$k]['dormitory']=$dormitory[0]['dor_num'];
    $grade[$k]['year']=date('Y',strtotime($user[0]['dates']));
    $grade[$k]['department']=$user[0]['department'];
}
$i=0;
foreach ($grade as $k => $val) {
    if(!empty($_GET['year'])){
        if($val['year'] == $_GET['year']){
            $grade1[$i]=$val;
            $i++;
        }
    }
    if(!empty($_GET['department'])){
        $name = urldecode($_GET['department']);
        if($val['department'] == $name){
            $grade1[$i]=$val;
            $i++;
        }
    }
}

if(!empty($_GET['year']) || !empty($_GET['department'])){
    $grade=$grade1;
}

if($page3 > $count3){
    if ($count3 == 0) {
        echo '<script>alert("搜索为空")</script>';
        header("refresh:1;url=?active=3");
    } else {
        $h3.= '&page3='.$count3;
        if (!empty($search3)) {
            $h3 .= '&search3=' . $search3;
        }
        header($h3);
    }
    //header('location:?page3='.$count3.'&active=3');
}
$pages3 = $p3->pages($page3);
$upPage3 = $p3->upPage();
$t3 = ($page3-1)*15+1;
for($i = 0; $i < count($grade); $i++){
    $grade[$i]['top'] = $t3+$i;
    $grade[$i]['num'] = 100-$grade[$i]['points'];
}

// 报修
if(!empty($_GET['page6'])){
    $page6 = $_GET['page6'];
    $active = $_GET['active'];
}
else{
    $page6 = 1;
}
$s6 = ['ORDER' => ['id' => 'DESC'], 'LIMIT' => [($page6-1)*12,12]];
$c6 = array();
$h6 = 'location:?active=6';
if(!empty($_GET['search6'])){
    $search6 =$p0->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search6']);
    $s6['AND'] = ['dormitoryId' => $search6[0]];
    $c6['AND'] = ['dormitoryId' => $search6[0]];
    $active = 6;
    // $h6.= '$search6='.$search6;
    $smarty->assign('search6',$search6[0]);
}
$s6['AND']['id[!]'] = 0;
$c6['AND']['id[!]'] = 0;
$_SESSION['s6'] = $s6;
$p6 = new Pages('repair','*',$s6);
$count6 = $p6->count($c6);
$repair = $p6->select();
foreach ($repair as $k => $val) {
    $dor_num=$p6->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $repair[$k]['dormitory']=$dor_num[0]['dor_num'];
}

if($page6 > $count6){
    if ($count6 == 0) {
        echo '<script>alert("搜索为空")</script>';
        header("refresh:1;url=?active=6");
    } else {
        $h6.= '&page6='.$count6;
        if (!empty($search6)) {
            $h6 .= '&search6=' . $search6;
        }
        header($h6);
    }
}
$pages6 = $p6->pages($page6);
$upPage6 = $p6->upPage();
$t6 = ($page6-1)*12+1;
for($i = 0; $i < count($repair); $i++){
    $repair[$i]['top'] = $t6+$i;
    $repair[$i]['num'] = 100-$repair[$i]['id'];
}
$smarty->assign('repair',$repair);
$smarty->assign('pages6',$pages6);
$smarty->assign('upPage6',$upPage6);
$smarty->assign('page6',$page6);




//公告区
$p1 = new Pages('notice', '*', ['state' => 0,'ORDER' => ['create_time' => 'DESC'], 'LIMIT' =>[0,5]]);
$notice = $p1->select();
$smarty->assign('notice',$notice);

//水电费
if(!empty($_GET['page7'])){
    $page7 = $_GET['page7'];
}
else{
    $page7 = 1;
}
$s7 = ['ORDER' => ['id' => 'DESC'], 'LIMIT' => [($page7-1)*12,12]];
$c7 = array();
$h7 = 'location:?active=7';
if(!empty($_GET['search7'])){
    $search7 = $search7 =$p0->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search7']);
        $s7['AND'] = ['dormitoryId' => $search7[0]];
        $c7['AND'] = ['dormitoryId' => $search7[0]];
        $active = 7;
        // $h7.= '$search7='.$search7;
        $smarty->assign('search7',$_GET['search7']);
}
$s7['AND']['id[!]'] = 0;
$c7['AND']['id[!]'] = 0;
$_SESSION['s7'] = $s7;
$p7 = new Pages('cost','*',$s7);
$count7 = $p7->count($c7);
$cost = $p7->select();
foreach ($cost as $k => $val) {
    $dor_num=$p7->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $cost[$k]['dormitory']=$dor_num[0]['dor_num'];
}
if($page7 > $count7){
    if ($count7 == 0) {
        echo '<script>alert("搜索为空")</script>';
        header("refresh:1;url=?active=7");
    } else {
        $h7.= '&page7='.$count7;
        if (!empty($search7)) {
            $h7 .= '&search7=' . $search7;
        }
        header($h7);
    }
}
$pages7 = $p7->pages($page7);
$upPage7 = $p7->upPage();
$t7 = ($page7-1)*12+1;
for($i = 0; $i < count($cost); $i++){
    $cost[$i]['top'] = $t7+$i;
    $cost[$i]['num'] = 100-$cost[$i]['id'];
}
$smarty->assign('cost',$cost);
$smarty->assign('pages7',$pages7);
$smarty->assign('upPage7',$upPage7);
$smarty->assign('page7',$page7);

//晚归
if(!empty($_GET['page8'])){
    $page8 = $_GET['page8'];
    $active = $_GET['active'];
}
else{
    $page8 = 1;
}
$s8 = ['ORDER' => ['id' => 'DESC'], 'LIMIT' => [($page8-1)*12,12]];
$c8 = array();
$h8 = 'location:?active=8';
if(!empty($_GET['search8'])){
    $search8 =$p0->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search8']);
    $s8['AND'] = ['dormitoryId' => $search8[0]];
    $c8['AND'] = ['dormitoryId' => $search8[0]];
    $active = 8;
    // $h8.= '$search8='.$search8;
    $smarty->assign('search8',$search8[0]);
}
$s8['AND']['id[!]'] = 0;
$c8['AND']['id[!]'] = 0;
$_SESSION['s8'] = $s8;
$p8 = new Pages('outlate','*',$s8);
$count8 = $p8->count($c8);
$outlate = $p8->select();
foreach ($outlate as $k => $val) {
    $dor_num=$p6->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $user=$p6->query("SELECT * FROM users WHERE  id=".$val['userId']);
    $outlate[$k]['no']=$user[0]['no'];
    $outlate[$k]['dormitory']=$dor_num[0]['dor_num'];
    $outlate[$k]['username']=$user[0]['username'];
}
if($page8 > $count8){
    if ($count8 == 0) {
        echo '<script>alert("搜索为空")</script>';
        header("refresh:1;url=?active=8");
    } else {
        $h8.= '&page8='.$count8;
        if (!empty($search8)) {
            $h8 .= '&search8=' . $search8;
        }
        header($h8);
    }
}
$pages8 = $p8->pages($page8);
$upPage8 = $p8->upPage();
$t8 = ($page8-1)*12+1;
for($i = 0; $i < count($outlate); $i++){
    $outlate[$i]['top'] = $t8+$i;
    $outlate[$i]['num'] = 100-$outlate[$i]['id'];
}
$smarty->assign('outlate',$outlate);
$smarty->assign('pages8',$pages8);
$smarty->assign('upPage8',$upPage8);
$smarty->assign('page8',$page8);

$smarty->assign('grade',$grade);
$smarty->assign('pages3',$pages3);
$smarty->assign('upPage3',$upPage3);
$smarty->assign('page3',$page3);
$smarty->assign('active',$active);
// var_dump($active);

//ajax请求
// if(!empty($_GET['type']))
// {
//     if(!empty($_GET['module']))
//     {
//         if($_GET['module']==='article')
//         {
           
//             $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 echo json_encode(array("result"=>true,"data"=>$notice));
//                 return;
//             }

//         }
//         else if($_GET['module']==='repair'){
//              $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 print_r($grade);
//                 echo json_encode(array("result"=>true,"data"=>$grade));
//                 return;
//             }
//         }
//         else if($_GET['module']==='repair2'){
//              $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 echo json_encode(array("result"=>true,"data"=>$repair));
//                 return;
//             }
//         }
//         else if($_GET['module']==='repair7'){
//              $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 echo json_encode(array("result"=>true,"data"=>$cost));
//                 return;
//             }
//         }
//         else if($_GET['module']==='repair4'){
//              $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 echo json_encode(array("result"=>true,"data"=>$message));
//                 return;
//             }
//         }
//         else if($_GET['module']==='repair5'){
//              $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 echo json_encode(array("result"=>true,"data"=>$users));
//                 return;
//             }
//         }
//         else if($_GET['module']==='repair6'){
//              $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 echo json_encode(array("result"=>true,"data"=>$liuxiao));
//                 return;
//             }
//         }else if($_GET['module']==='repair8'){
//              $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 echo json_encode(array("result"=>true,"data"=>$outlate));
//                 return;
//             }
//         }else if($_GET['module']==='repair9'){
//              $type=$_GET['type'];
//             if($type=="ajax")
//             {
//                 echo json_encode(array("result"=>true,"data"=>$tjcs));
//                 return;
//             }
//         }
    
//     }


// }

$smarty->assign('user', $_SESSION['user']);
$smarty->display('manage_user.html');