<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no;">
    <title>文件传输系统</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        #box2{
            /* text-align:left; */
            background-color: gold;

        }
        #box{
            /* text-align:justify; */
            background-color: rgb(189, 228, 243);
            font-size: 30px;
        }
    </style>
    <?php
$user_arr = array();
$servername = 'localhost';
$username = 'youinme';
$password = '123456';
// build connection
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset($conn,'utf8');
// check connection
if ($conn->connect_error){
	die('failed:'.$conn->connect_error);
}
$sql = 'use youinme;';
$conn->query($sql);
$sql = 'select uname from user;';
$ret = $conn->query($sql);
if ($ret -> num_rows > 0){
    while($row = $ret -> fetch_assoc()){
        array_push($user_arr,$row['uname']);
    }
}
$conn->close();
?>
    <script src="jquery-1.12.2.min.js"></script>
</head>
<body>
    <div id="box" >
        欢迎使用文件传输系统    
    </div>
<!-- ===================================================================== -->
    <div id="box2" class='change'>
       <table><tr><th >请选择您的姓名。有xxx个未读文件，请点击查看</th> </tr></table>
    </div>
<!-- ===================================================================== -->
    <div style="background:lightgreen" id="box3" >
      <form action="sign_up.php" method='post' >
       <table><tbody>
       <tr><th >
      请选择文件： <input type="file" multiple name="upload"> <br>
       </th> </tr> 
       <tr><th >
        请选择人员：
       </th> </tr>
       <tr><th >
        请输入消息内容：
       </th> </tr>
    </tbody></table>
         <input type="submit" value="上传"  id="sign_btn">
</form> 
    </div>
<!-- ===================================================================== -->
    <div id="box4"> 
        <?php
            $user_str = '';
            foreach($user_arr as $value){
                $user_str .= $value.' ';
            }
        ?>
        <script>
            var user_str ='<?php echo $user_str; ?>'
            var user_arr = user_str.split(' ')
            console.log(user_arr)
        </script>
    </div>
<!-- ===================================================================== -->
    <div id="box5"> 
        文件列表：接收人，发送人，文件，备注，日期，时间
    </div>
     <?php
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $current_ip = $_SERVER['REMOTE_ADDR'];
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
	$client = explode(' ',$browser);
	// preg_match("\d",$browser,$matches);
	preg_match("/(?:\()(.*)(?:\))/i",$browser,$matches);
	// print_r ($matches);
    ?>
    <div id="box">
        <span><?php 
	   $f = fopen('count.txt','a+');
	   $count = fread($f,filesize('count.txt'));
	   $count = $count + 1;
	   fclose($f);
	   $f = fopen('count.txt','w+');
	   fwrite($f,$count);
	   fclose($f);

	   $f = fopen('log.txt','a+');
	   $log_content = "$count \t $current_ip \t $client[1]$client[2]$client[3]$client[4] \t $date \t $time\n";
	   fwrite($f,$log_content);
	   fclose($f);

           ?>
        </span>
</body>
</html>
