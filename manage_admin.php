<?php
header("Content-Type:text/html;charset=UTF-8");   
require_once 'smarty_inc.php';
require_once 'background/Pages.class.php';

/**
 * 数组分页函数 核心函数 array_slice
 * 用此函数之前要先将数据库里面的所有数据按一定的顺序查询出来存入数组中
 * $count  每页多少条数据
 * $page  当前第几页
 * $array  查询出来的所有数组
 * order 0 - 不变   1- 反序
 */
function page_array($count,$page,$array,$order){
  global $countpage; #定全局变量
  $page=(empty($page))?'1':$page; #判断当前页面是否为空 如果为空就表示为第一页面 
    $start=($page-1)*$count; #计算每次分页的开始位置
  if($order==1){
   $array=array_reverse($array);
  }  
  $totals=count($array); 
  $countpage=ceil($totals/$count); #计算总页面数
  $pagedata=array();
 $pagedata=array_slice($array,$start,$count);
  return $pagedata; #返回查询数据
}
/**
 * 分页及显示函数
 * $countpage 全局变量，照写
 * $url 当前url
 */
function show_array($countpage,$url){
   $page=empty($_GET['page9'])?1:$_GET['page9'];
 if($page > 1){
   $uppage=$page-1;
 }else{
  $uppage=1;
 }
 if($page < $countpage){
   $nextpage=$page+1;
 
 }else{
   $nextpage=$countpage;
 }

 $str="<li onclick='fenye({$uppage})'><a aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
 $str.="<li onclick='fenye({$page})'  class='active'><a>{$page}</a></li>";
 if($countpage-$page < 4){
    for ($i=1; $i <=$countpage-$page; $i++) { 
        $page1=$page+$i;
        $str.="<li onclick='fenye({$page1})'><a>{$page1}</a></li>";
    }
 }else{
    for ($i=1; $i <=4; $i++) { 
        $page1=$page+$i;
        $str.="<li onclick='fenye({$page1})'><a>{$page1}</a></li>";
    }
 }
 $str.="<li onclick='fenye({$nextpage})'><a aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
 return $str;
}

session_start();
if(empty($_SESSION['power']) || $_SESSION['power'] < 1){
    header('location:login.php');
    return false;
}

if(!empty($_GET['active'])){
    $active = $_GET['active'];
}
else{
    $active = 1;
}
//公告区
if(!empty($_GET['page1'])){
    $page1 = $_GET['page1'];
}
else{
    $page1 = 1;
}
$s1 = [ 'ORDER' => ['create_time' => 'DESC'], 'LIMIT' =>[($page1-1)*10,10]];
$c1 = '*';
if(!empty($_GET['search1'])){
    $search1 = $_GET['search1'];
    $smarty->assign('search1',$search1);
    $s1['OR'] = ['title[~]' => $search1, 'name[~]' => $search1];
    $c1 = ['OR' => ['title[~]' => $search1, 'name[~]' => $search1]];
}
$p1 = new Pages('notice', '*', $s1);

// var_dump($p1);
$count1 = $p1->count($c1);
$notice = $p1->select();
if($page1 > $count1){
    if(!empty($search1)){
        header('location:?page1='.$count1.'&search1='.$search1.'');
    }
    else{
        header('location:?page1='.$count1.'');
    }
}
$pages1 = $p1->pages($page1);
$upPage1 = $p1->upPage();
$t1 = ($page1-1)*15+1;
for($i = 0; $i < count($notice); $i++){
    $notice[$i]['top'] = $t1+$i;
}

$smarty->assign('notice',$notice);
$smarty->assign('pages1',$pages1);
$smarty->assign('upPage1',$upPage1);
$smarty->assign('page1',$page1);

//报修处理
if(!empty($_GET['page2'])){
    $page2 = $_GET['page2'];
}
else{
    $page2 = 1;
}
$s2 = ['ORDER' => ['create_time' => 'DESC'], 'LIMIT' =>[($page2-1)*12,12]];
$c2 = array();
if(!empty($_GET['need'])){
    $smarty->assign('need',$_GET['need']);
    if(!empty($_GET['search2'])){
        $search2 =$p1->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search2']) ;
        $smarty->assign('search2', $search2[0]);
        echo 1;
        $s2['AND'] = ['yon' => 0];
        $c2['AND'] = ['yon' => 0];
        $s2['AND']['OR'] = ['dormitoryId' => $search2[0]];
        $c2['AND']['OR'] = ['dormitoryId' => $search2[0]];
    }
    else {
        $s2['yon'] = 0;
        $c2['yon'] = 0;
    }
    $active = 2;
}
else{
    if(!empty($_GET['search2'])) {
        $active = 2;
        $search2 = $search2 =$p1->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search2']);
        $smarty->assign('search2', $search2[0]);
        $s2['OR'] = ['dormitoryId' => $search2[0]];
        $c2['OR'] = ['dormitoryId' => $search2[0]];
    }
    if (isset($_GET['need'])) {
        $s2['AND'] = ['yon' => 1];
        $c2['AND'] = ['yon' => 1];
    }
}
//print_r($s2);
$p2 = new Pages('repair', '*', $s2);
$count2 = $p2->count($c2);
$repair = $p2->select();
foreach ($repair as $k => $val) {
    $dor2=$p2->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $repair[$k]['dormitory']=$dor2[0]['dor_num'];

}


if($page2 > $count2) {
    if ($count2 == 0) {
        // echo '<script>alert("搜索为空")</script>';
        header("refresh:1;url=?active=2");
    } else {

        $h = 'location:?page2=' . $count2 . '&active=2';
        if (!empty($_GET['need'])) {
            $h .= '&need=' . $_GET['need'];
        }
        if (!empty($search2)) {
            $h .= '&search2=' . $search2;
        }
        header($h);
    }
}
$pages2 = $p2->pages($page2);
$upPage2 = $p2->upPage();
$t2 = ($page2-1)*15+1;
for($i = 0; $i < count($repair); $i++){
    $repair[$i]['top'] = $t2+$i;
}
$smarty->assign('repair',$repair);
$smarty->assign('pages2',$pages2);
$smarty->assign('upPage2',$upPage2);
$smarty->assign('page2',$page2);

// 留校登记
if(!empty($_GET['page6'])){
    $page6 = $_GET['page6'];
}
else{
    $page6 = 1;
}
$s6 = ['LIMIT' => [($page6-1)*12,12]];//'ORDER' => ['id' => 'DESC']
$c6 = array();
$h6 = 'location:?active=6';
if(!empty($_GET['year6']) || !empty($_GET['department6'])){
    $active = 6;
    $liuxiao6=array();
}

if(!empty($_GET['search6'])){
    $search6 =$p1->query("SELECT id FROM users WHERE  no=".$_GET['search6']) ;
    $s6['AND']['OR'] = ['userId' => $search6[0]];
    $c6['AND']['OR'] = ['userId' => $search6[0]];
    $active = 6;
    // $h6.= '$search6='.$search6;
    $smarty->assign('search6',$search6[0]);
}
$s6['AND']['id[!]'] = 0;
$c6['AND']['id[!]'] = 0;

$_SESSION['s6'] = $s6;
$p6 = new Pages('stay','*',$s6);
$count6 = $p6->count($c6);
$liuxiao = $p6->select();
foreach ($liuxiao as $k => $val) {
    $dor6=$p6->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $user6=$p6->query("SELECT * FROM users WHERE  id=".$val['userId']);
    $liuxiao[$k]['dormitory']=$dor6[0]['dor_num'];
    $liuxiao[$k]['username']=$user6[0]['username'];
    $liuxiao[$k]['department']=$user6[0]['department'];
    $liuxiao[$k]['class']=$user6[0]['class'];
    $liuxiao[$k]['no']=$user6[0]['no'];
    $liuxiao[$k]['year']=date("Y",strtotime($user6[0]['dates']));

}
$i=0;
foreach ($liuxiao as $k => $val) {
    if(!empty($_GET['year6'])){
        if($val['year'] == $_GET['year6']){
            // $grade=$val;
            $liuxiao6[$i]=$val;
            $i++;
            // $liuxiao=$liuxiao6;
            // break;
        }
    }
    if(!empty($_GET['department6'])){
        $name = urldecode($_GET['department6']);
        if($val['department'] == $name){
            // $grade=$val;
            $liuxiao6[$i]=$val;
            $i++;
            // $liuxiao=$liuxiao6;
            // break;
        }
    }
}
if(!empty($_GET['year6']) || !empty($_GET['department6'])){
    $liuxiao=$liuxiao6;
}

if($page6 > $count6){
    if ($count6 == 0) {
        // echo '<script>alert("搜索为空")</script>';
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
$t6 = ($page6-1)*15+1;
for($i = 0; $i < count($liuxiao); $i++){
    $liuxiao[$i]['top'] = $t6+$i;
    $liuxiao[$i]['num'] = 100-$liuxiao[$i]['id'];
}
$smarty->assign('liuxiao',$liuxiao);
$smarty->assign('pages6',$pages6);
$smarty->assign('upPage6',$upPage6);
$smarty->assign('page6',$page6);

// 晚归纪录
if(!empty($_GET['page8'])){
    $page8 = $_GET['page8'];
}
else{
    $page8 = 1;
}
$s8 = ['ORDER' => ['id' => 'DESC'], 'LIMIT' => [($page8-1)*12,12]];
$c8 = array();
$h8 = 'location:?active=8';
if(!empty($_GET['year8']) || !empty($_GET['department8'])){
    $active = 8;
    $outlate8=array();
}

if(!empty($_GET['search8'])){
    $search8 =$p1->query("SELECT id FROM users WHERE  no=".$_GET['search8']) ;
    $s8['AND']['OR'] = ['userId' => $search8[0]];
    $c8['AND']['OR'] = ['userId' => $search8[0]];
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
    $dor8=$p8->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $user8=$p8->query("SELECT * FROM users WHERE  id=".$val['userId']);
    $outlate[$k]['dormitory']=$dor8[0]['dor_num'];
    $outlate[$k]['username']=$user8[0]['username'];
    $outlate[$k]['department']=$user8[0]['department'];
    $outlate[$k]['class']=$user8[0]['class'];
    $outlate[$k]['no']=$user8[0]['no'];
    $outlate[$k]['year']=date("Y",strtotime($user8[0]['dates']));

}
$i=0;
foreach ($outlate as $k => $val) {
    if(!empty($_GET['year8'])){
        if($val['year'] == $_GET['year8']){
            // $grade=$val;
            $outlate8[$i]=$val;
            $i++;
            // $liuxiao=$liuxiao6;
            // break;
        }
    }
    if(!empty($_GET['department8'])){
        $name = urldecode($_GET['department8']);
        if($val['department'] == $name){
            // $grade=$val;
            $outlate8[$i]=$val;
            $i++;
            // $liuxiao=$liuxiao6;
            // break;
        }
    }
}
if(!empty($_GET['year8']) || !empty($_GET['department8'])){
    $outlate=$outlate8;
}

if($page8 > $count8){
    if ($count8 == 0) {
        // echo '<script>alert("搜索为空")</script>';

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
$t8 = ($page8-1)*15+1;
for($i = 0; $i < count($outlate); $i++){
    $outlate[$i]['top'] = $t8+$i;
    $outlate[$i]['num'] = 100-$outlate[$i]['id'];
}
$smarty->assign('outlate',$outlate);
$smarty->assign('pages8',$pages8);
$smarty->assign('upPage8',$upPage8);
$smarty->assign('page8',$page8);

// 晚归统计
if(!empty($_GET['page9'])){
    $page9 = $_GET['page9'];
}
else{
    $page9 = 1;
}
if(!empty($_GET['year9']) || !empty($_GET['department9'])){
    $tjcs9=array();
}
$s9 = ['ORDER' => ['id' => 'DESC'], 'LIMIT' => [($page9-1)*8,8]];
$c9 = array();
$h9 = 'location:?active=9';

// var_dump($s9);
$_SESSION['s9'] = $s9;
$p9 = new Pages('outlate','*',$s9);

if(!empty($_GET['search9'])){
    $search9=$p9->query("SELECT id FROM users WHERE  no=".$_GET['search9']);
    // print_r($search9);
    $tjcs = $p9->query("SELECT *,COUNT(*) AS counts FROM outlate WHERE `userId`=".$search9[0][0]);
}else{
    $tjcs = $p9->query("SELECT *,COUNT(*) AS counts FROM outlate GROUP BY `userId`");
}
$count9 =count($tjcs);
foreach ($tjcs as $k => $val) {
    $dor9=$p9->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $user9=$p9->query("SELECT * FROM users WHERE  id=".$val['userId']);
    $tjcs[$k]['dormitory']=$dor9[0]['dor_num'];
    $tjcs[$k]['username']=$user9[0]['username'];
    $tjcs[$k]['department']=$user9[0]['department'];
    $tjcs[$k]['class']=$user9[0]['class'];
    $tjcs[$k]['no']=$user9[0]['no'];
    $tjcs[$k]['year']=date("Y",strtotime($user9[0]['dates']));

}
$i=0;
foreach ($tjcs as $k => $val) {
    if(!empty($_GET['year9'])){
        if($val['year'] == $_GET['year9']){
            // $grade=$val;
            $tjcs9[$i]=$val;
            $i++;
            // $liuxiao=$liuxiao6;
            // break;
        }
    }
    if(!empty($_GET['department9'])){
        $name = urldecode($_GET['department9']);
        if($val['department'] == $name){
            // $grade=$val;
            $tjcs9[$i]=$val;
            $i++;
            // $liuxiao=$liuxiao6;
            // break;
        }
    }
}
if(!empty($_GET['year9']) || !empty($_GET['department9'])){
    $tjcs=$tjcs9;
}


// var_dump($tjcs);
if($page9 > $count9){
    if ($count9 == 0) {
        // echo '<script>alert("搜索为空")</script>';
        header("refresh:1;url=?active=9");
    } else {

        $h9.= '&page9='.$count9;
        if (!empty($search9)) {
            $h9 .= '&search9=' . $search9;
        }
        header($h9);
    }
}
$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$tjcs = page_array(10,$page9,$tjcs,0);
$upPage9 = show_array($countpage,$url);
// var_dump($page9);
// $t9 = ($page9-1)*15+1;
// for($i = 0; $i < count($tjcs); $i++){
//     $tjcs[$i]['top'] = $t9+$i;
//     $tjcs[$i]['num'] = 100-$tjcs[$i]['id'];
// }

$smarty->assign('tjcs',$tjcs);
// $smarty->assign('pages9',$pages9);
$smarty->assign('upPage9',$upPage9);
$smarty->assign('page9',$page9);

//宿舍评分管理
if(!empty($_GET['page3'])){
    $page3 = $_GET['page3'];
}
else{
    $page3 = 1;
}
$s3 = ['ORDER' => ['points'], 'LIMIT' => [($page3-1)*12,12]];
$c3 = array();
$h3 = 'location:?active=3';
if(!empty($_GET['week3'])){
    $s3['AND']['weekly'] = $_GET['week3'];
    $c3['AND']['weekly'] = $_GET['week3'];
    $smarty->assign('week',$_GET['week3']);
    // $h3.= '&week='.$_GET['week'];
    $active = 3;
}
if(!empty($_GET['department'])){
    $s3['AND']['department'] = $_GET['department'];
    $c3['AND']['department'] = $_GET['department'];
    $smarty->assign('department', $_GET['department']);
    $h3.= '&department='.$_GET['department'];
    $active = 3;
}
if(!empty($_GET['year3'])){
    // $uid= $p9->query("SELECT * FROM users WHERE  dor_num=".$_GET['search3']);
    // $s3['AND']['year'] = $_GET['year'];
    // $c3['AND']['year'] = $_GET['year'];
    // $smarty->assign('year', $_GET['year']);
    // $h3.= '&year='.$_GET['year'];
    // $active = 3;
    // $grade1=array();
}
if(!empty($_GET['sex'])){
    $s3['AND']['sex'] = $_GET['sex'];
    $c3['AND']['sex'] = $_GET['sex'];
    $smarty->assign('sex', $_GET['sex']);
    $h3.= '&sex='.$_GET['sex'];
    $active = 3;
}
if(!empty($_GET['sort'])){
    if($_GET['sort'] == 2){
        $s3['ORDER'] = ['weekly' => 'DESC'];
        $smarty->assign('sort', $_GET['sort']);
        $h3.= '&sort='.$_GET['sort'];
    }
    $active = 3;
}
if(!empty($_GET['year3']) || !empty($_GET['week3']) || !empty($_GET['department3'])){
    $active = 3;
    $grade1=array();
}
if(!empty($_GET['search3'])){
    $search3 = $p9->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search3']);
    $s3['AND'] =['dormitoryId' => $search3['0']];
    $c3['AND'] =['dormitoryId' => $search3['0']];
    $active = 3;
    // $h3.= '$search3='.$search3[0];
    $smarty->assign('search3',$search3[0]);

}
$s3['AND']['id[!]'] = 0;
$c3['AND']['id[!]'] = 0;
$_SESSION['s3'] = $s3;
$p3 = new Pages('grade','*',$s3);
$count3 = $p3->count($c3);
$grade = $p3->select();
// print_r($s3);
    // exit();

foreach ($grade as $k => $val) {
    $dor3=$p3->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $user3=$p3->query("SELECT * FROM users WHERE  id=".$val['userId']);
    $grade[$k]['dormitory']=$dor3[0]['dor_num'];
    $grade[$k]['department']=$user3[0]['department'];
    $grade[$k]['class']=$user3[0]['class'];
    $grade[$k]['year']=date("Y",strtotime($user3[0]['dates']));

}
$i=0;
foreach ($grade as $k => $val) {
    if(!empty($_GET['year3'])){
        if($val['year'] == $_GET['year3']){
            // $grade=$val;
            $grade1[$i]=$val;
            $i++;
            // $grade=$grade1;
            // break;
        }
    }
    if(!empty($_GET['department3'])){
        $name = urldecode($_GET['department3']);
        if($val['department'] == $name){
            // $grade=$val;
            $grade1[$i]=$val;
            $i++;
            // $grade=$grade1;
            // break;
        }
    }
}
// var_dump($grade);

if(!empty($_GET['year3']) || !empty($_GET['department3'])){
    $grade=$grade1;
}

if($page3 > $count3){
    if ($count3 == 0) {
        //echo '<script>alert("搜索为空")</script>';
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

$smarty->assign('grade',$grade);
$smarty->assign('pages3',$pages3);
$smarty->assign('upPage3',$upPage3);
$smarty->assign('page3',$page3);

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
if(!empty($_GET['need7'])){
    $smarty->assign('need',$_GET['need7']);
    if(!empty($_GET['search7'])){
        $search7 =$p9->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search7']);
        $smarty->assign('search7', $search7[0]);
        echo 1;
        $s7['AND'] = ['state' => 0];
        $c7['AND'] = ['state' => 0];
        $s7['AND']['OR'] = ['dormitoryId' => $search7[0]];
        $c7['AND']['OR'] = ['dormitoryId' => $search7[0]];
    }
    else {
        $s7['state'] = 0;
        $c7['state'] = 0;
    }
    $active = 7;
}else{
    if(!empty($_GET['search7'])){
        $search7 = $search7 =$p9->query("SELECT id FROM dormitory WHERE  dor_num=".$_GET['search7']);
        $s7['AND']['OR'] = ['dormitoryId' => $search7[0]];
        $c7['AND']['OR'] = ['dormitoryId' => $search7[0]];
        $active = 7;
        // $h7.= '$search7='.$search7;
        $smarty->assign('search7',$search7[0]);
    }
}

$s7['AND']['id[!]'] = 0;
if(isset($s7['state']) && isset($c7['state']))
{
    $s7['AND']['state']=$s7['state'];
    $c7['AND']['state'] =$c7['state'];
}
$c7['AND']['id[!]'] = 0;
$_SESSION['s7'] = $s7;
// print_r($s7);
$p7 = new Pages('cost','*',$s7);
$count7 = $p7->count($c7);
$cost = $p7->select();
foreach ($cost as $k => $val) {
    $dor7=$p7->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
    $cost[$k]['dormitory']=$dor7[0]['dor_num'];
}
if($page7 > $count7){
    if ($count7 == 0) {
        // echo '<script>alert("搜索为空")</script>';
        header("refresh:1;url=?active=7");
    } else {

        $h = 'location:?page7=' . $count7 . '&active=7';
        if (!empty($_GET['need'])) {
            $h .= '&need=' . $_GET['need'];
        }
        if (!empty($search7)) {
            $h .= '&search7=' . $search7;
        }
        header($h);
    }
}
$pages7 = $p7->pages($page7);
$upPage7 = $p7->upPage();
$t7 = ($page7-1)*15+1;
for($i = 0; $i < count($cost); $i++){
    $cost[$i]['top'] = $t7+$i;
    $cost[$i]['num'] = 100-$cost[$i]['id'];
}

$smarty->assign('cost',$cost);
$smarty->assign('pages7',$pages7);
$smarty->assign('upPage7',$upPage7);
$smarty->assign('page7',$page7);

//查看留言
if(!empty($_GET['page4'])){
    $page4 = $_GET['page4'];
}
else{
    $page4 = 1;
}
$s4 = ['ORDER' => ['create_time' => 'DESC'], 'LIMIT' => [($page4-1)*12,12]];
$c4 = array();
if(!empty($_GET['need4'])){
    $need4 = $_GET['need4'];
    $smarty->assign('need4',$need4);
    $active = 4;
    $s4['AND'] = ['answer' => ''];
    $c4['AND'] = ['answer' => ''];
}

if(!empty($_GET['search4'])){
    $active = 4;
    $search4 = $_GET['search4'];
    $smarty->assign('search4',$search4);
    $s4['AND']['OR'] = ['title[~]' => $search4,'username[~]'=>$search4];
    $c4['AND']['OR'] = [ 'title[~]' => $search4,'username[~]'=>$search4];
}
$s4['AND']['id[!]'] = 0;
$c4['AND']['id[!]'] = 0;
$p4 = new Pages('message','*',$s4);
$count4 = $p4->count($c4);
$message = $p4->select();
if($page4 > $count4){
    if($count4 == 0){
        // echo '<script>alert("搜索为空")</script>';
        header('refresh:1;url=?page4='.$count4.'&active=4');
    }
    else {
        $h = 'location:?page4=' . $count4 . '&active=4';
        if(!empty($need4)){
            $h.= '&need4='.$need4;
        }
        if(!empty($search4)){
            $h.= '&search4='.$search4;
        }
        header($h);
    }
}
$pages4 = $p4->pages($page4);
$upPage4 = $p4->upPage();
$t4 = ($page4-1)*15+1;
for($i = 0; $i < count($message); $i++){
    $message[$i]['top'] = $t4+$i;
}
$smarty->assign('message',$message);
$smarty->assign('pages4',$pages4);
$smarty->assign('upPage4',$upPage4);
$smarty->assign('page4',$page4);

//用户管理
if(!empty($_GET['page5'])){
    $page5 = $_GET['page5'];
}
else{
    $page5 = 1;
}
$s5 = [ 'LIMIT' => [($page5-1)*12,12]];
$c5 = array();
if(!empty($_GET['need5'])){
    $need5 = $_GET['need5'];
    $smarty->assign('need5',$need5);
    $active = 5;
    $s5['AND'] = ['power' => 1];
    $c5['AND'] = ['power' => 1];
}
if(!empty($_GET['search5'])){
    $active = 5;
    $search5 = $_GET['search5'];
    $smarty->assign('search5',$search5);
    $s5['AND']['OR'] = ['no[~]' => $search5, 'username[~]' => $search5, 'sex[~]' => $search5, 'department[~]' => $search5, 'class[~]' => $search5];
    $c5['AND']['OR'] = ['no[~]' => $search5, 'username[~]' => $search5, 'sex[~]' => $search5,  'department[~]' => $search5,'class[~]' => $search5];
}
$s5['AND']['id[!]'] = 0;
$c5['AND']['id[!]'] = 0;
// print_r($s5);
$p5 = new Pages('users','*',$s5);
$count5 = $p5->count($c5);
$users = $p5->select();
// print_r($users);
foreach ($users as $k => $val) {
        if($val['dormitoryId'] == 0){
            $users[$k]['dormitory']= '';
        }else{
            $ss=$p5->query("SELECT dor_num FROM dormitory WHERE  id=".$val['dormitoryId']);
            $users[$k]['dormitory']= $ss[0]['dor_num'];
        }
}

if($page5 > $count5){
    if($count5 == 0){
        // echo '<script>alert("搜索为空")</script>';
        header('refresh:1;url=?active=5');
    }
    else {
        $h = 'location:?page5=' . $count5 . '&active=5';
        if (!empty($need5)) {
            $h .= '&need5=' . $need5;
        }
        if (!empty($search5)) {
            $h .= '&search5=' . $search5;
        }
        header($h);
    }
    //header('location:?page5='.$count5.'&active=5');
}
$t5 = ($page5-1)*15+1;
for($i = 0; $i < count($users); $i++){
    $users[$i]['top'] = $t5+$i;
}
$pages5 = $p5->pages($page5);
$upPage5 = $p5->upPage();
$smarty->assign('users',$users);
$smarty->assign('pages5',$pages5);
$smarty->assign('upPage5',$upPage5);
$smarty->assign('page5',$page5);

$smarty->assign('active',$active);
$smarty->assign('user',$_SESSION['user']);

//ajax请求
if(!empty($_GET['type']))
{
    if(!empty($_GET['module']))
    {
        if($_GET['module']==='article')
        {
           
            $type=$_GET['type'];
            if($type=="ajax")
            {
                echo json_encode(array("result"=>true,"data"=>$notice));
                return;
            }

        }
        else if($_GET['module']==='repair'){
             $type=$_GET['type'];
            if($type=="ajax")
            {
                // print_r($upPage3);
                echo json_encode(array("result"=>true,"data"=>$grade));
                return;
            }
        }
        else if($_GET['module']==='repair2'){
             $type=$_GET['type'];
            if($type=="ajax")
            {
                echo json_encode(array("result"=>true,"data"=>$repair));
                return;
            }
        }
        else if($_GET['module']==='repair7'){
             $type=$_GET['type'];
            if($type=="ajax")
            {
                echo json_encode(array("result"=>true,"data"=>$cost));
                return;
            }
        }
        else if($_GET['module']==='repair4'){
             $type=$_GET['type'];
            if($type=="ajax")
            {
                echo json_encode(array("result"=>true,"data"=>$message));
                return;
            }
        }
        else if($_GET['module']==='repair5'){
             $type=$_GET['type'];
            if($type=="ajax")
            {
                echo json_encode(array("result"=>true,"data"=>$users));
                return;
            }
        }
        else if($_GET['module']==='repair6'){
             $type=$_GET['type'];
            if($type=="ajax")
            {
                echo json_encode(array("result"=>true,"data"=>$liuxiao));
                return;
            }
        }else if($_GET['module']==='repair8'){
             $type=$_GET['type'];
            if($type=="ajax")
            {
                echo json_encode(array("result"=>true,"data"=>$outlate));
                return;
            }
        }else if($_GET['module']==='repair9'){
             $type=$_GET['type'];
            if($type=="ajax")
            {
                echo json_encode(array("result"=>true,"data"=>$tjcs));
                return;
            }
        }
    
    }


}
$smarty->display('manage_admin.html');