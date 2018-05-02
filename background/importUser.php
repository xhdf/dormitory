<?php
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Reader/Excel5.php';
require_once '../libs/medoo.php';
$database = new medoo(['database_type' => 'mysql',
    'database_name' => 'ssglxt',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'doryu',
    'charset' => 'utf8']);
//接收上传文件
if ($_FILES["file"]["error"] > 0){
    // print_r('hello');
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
// var_dump(__DIR__);
$dir=__DIR__.'/file/';
$file = $dir.$_FILES['file']['name'];
// $file=__DIR__.'/file/'.$_FILES['file']['name'];


// print_r($file);
// print_r($_FILES['file']['tmp_name']);
move_uploaded_file($_FILES['file']['tmp_name'], $dir.$_FILES['file']['name']);
//$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
$extension = substr($file, strrpos($file, '.')+1);

if( $extension =='xls'){
    $objReader = new PHPExcel_Reader_Excel5();
}else if( $extension =='xlsx' ){
    $objReader = new PHPExcel_Reader_Excel2007();
}else{
   
    $arr['result'] = 0;
    $arr['mes'] = '文件格式错误';
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    exit;
}

$objPHPExcel = $objReader->load($dir.$_FILES['file']['name']); //$filename可以是上传的文件，或者是指定的文件
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow(); // 取得总行数
$highestColumn = $sheet->getHighestColumn(); // 取得总列数
// print_r($highestColumn);
$k = 0;

//循环读取excel文件,读取一条,插入一条
//for($j=2;$j<=$highestRow;$j++)
//{
//    $a = $objPHPExcel->getActiveSheet()->getCell("id".$j)->getValue();
//    //$b = $objPHPExcel->getActiveSheet()->getCell("name".$j)->getValue();
//    echo $a.'<br/>';
//    //echo $b.'<br/>';
//}
for($j=2;$j<=$highestRow;$j++)                        //从第二行开始读取数据
{
     // print_r('hdjjf');
    $str=array();
    for($k='A';$k<$highestColumn;$k++)            //从A列读取数据
    {
        $str[$k]=$objPHPExcel->getActiveSheet()->getCell($k.$j)->getValue();//读取单元格
    }
    // print_r($str);
    if(!empty($str)){
        $dorId=$database->select("dormitory","id",['dor_num'=>$str['I']]);
        if ($dorId) {
            $data=array('username' => $str['A'], 'sex' => $str['B'], 'no' => $str['C'], 'password' => $str['D'],'department' => $str['E'], 'class' =>$str['F'], 'dates' =>$str['G'], 'power' => $str['H'],'dormitoryId'=>$dorId[0]);
            // var_dump($data);
            $result=$database->insert("users", $data);
        }
        
        // var_dump($result);
        // $date= date("Y-m-d",strtotime($str['H']));
        // var_dump($date);

        $arr['result'] = 1;
        $arr['mes'] = '导入成功';
    }else{
        $arr['result'] = 0;
        $arr['mes'] = '导入失败';
    }
//$str=mb_convert_encoding($str,'GBK','auto');//根据自己编码修改
//    $strs = explode("|*|",$str);
//// echo $str . "<br />";
//    $sql = "insert into test (title,content,sn,num) values ('{$strs[0]}','{$strs[1]}','{$strs[2]}','{$strs[3]}')";
////echo $sql;
//    if(!mysql_query($sql,$conn))
//    {
//        echo 'excel err';
//    }

}


// function upExecel(){

// //判断是否选择了要上传的表格
// if (empty($_POST['data'])) {
//     // echo "<script>alert(您未选择表格);history.go(-1);</script>";
//     echo json_encode(['code'=>0]);
// }

// //获取表格的大小，限制上传表格的大小5M
// $file_size = $_FILES['myfile']['size'];
// if ($file_size>5*1024*1024) {
// echo "<script>alert('上传失败，上传的表格不能超过5M的大小');history.go(-1);</script>";
//     exit();
// }

// //限制上传表格类型
// $file_type = $_FILES['myfile']['type'];
// //application/vnd.ms-excel  为xls文件类型
// if ($file_type!='application/vnd.ms-excel') {
//     echo "<script>alert('上传失败，只能上传excel2003的xls格式!');history.go(-1)</script>";
//  exit();
// }

// //判断表格是否上传成功
// if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
//     require_once 'PHPExcel.php';
//     require_once 'PHPExcel/IOFactory.php';
//     require_once 'PHPExcel/Reader/Excel5.php';
//     //以上三步加载phpExcel的类

//     $objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format 
//     //接收存在缓存中的excel表格
//     $filename = $_FILES['myfile']['tmp_name'];
//     $objPHPExcel = $objReader->load($filename); //$filename可以是上传的表格，或者是指定的表格
//     $sheet = $objPHPExcel->getSheet(0); 
//     $highestRow = $sheet->getHighestRow(); // 取得总行数 
//     // $highestColumn = $sheet->getHighestColumn(); // 取得总列数
    
//     //循环读取excel表格,读取一条,插入一条
//     //j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
//     //$a表示列号
//     for($j=2;$j<=$highestRow;$j++)  
//     {
//         $a = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取A(业主名字)列的值
//         $b = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取B(密码)列的值
//         $c = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();//获取C(手机号)列的值
//         $d = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();//获取D(地址)列的值

//         //null 为主键id，自增可用null表示自动添加
//         $sql = "INSERT INTO house VALUES(null,'$a','$b','$c','$d')";
//         // echo "$sql";
//         // exit();
//         $res = mysql_query($sql);
//         if ($res) {
//             echo "<script>alert('添加成功！');window.location.href='./test.php';</script>";
            
//         }else{
//             echo "<script>alert('添加失败！');window.location.href='./test.php';</script>";
//             exit();
//         }
//     }
// }
// }



// echo json_encode(array("result"=>true,"data"=>$outlate));
// return;

echo json_encode($arr);