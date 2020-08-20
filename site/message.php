<!DOCTYPE html>
<?php
    $expire = time()+60*60*24*700;  // cookie's expire time is 700 days
    if ($_POST){
            setcookie('user', $_POST['uname'],$expire);
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no;">
	<title>YOUINME</title>
	<link rel="stylesheet" href="css/main.css">
    <!-- <script src="js/jquery-1.12.2.min.js"></script> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- <script src="js/bootstrap.min.js"></script> -->
	<style>
	body{
            text-align: center;
            font-size: 15px;
		}
	</style>	

</head>
<body>
<?php
// --------------------
include 'database_enter.php';
$password = "LMa4c7^_DL}fzex3";
// // read database parameter from file: database.json
// $database_param = file_get_contents('json/database.json');
// // JSON --> array
// $database_array = json_decode($database_param, true);
// $servername = $database_array["servername"];
// $username = $database_array["username"];
// $password = $database_array["password"];
// $database_name = $database_array["database_name"];
// --------------------
// build connection
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset($conn,'utf8');
// check connectionheader('Content-type: text/html;charset=utf-8');
if ($conn->connect_error){
	die('failed:'.$conn->connect_error);
}
$use_query = "use ".$database_name.";";
$conn->query($use_query);
if ($_POST){
	$uname = $_POST['uname'] ;
	if (!$uname){$uname = 'XXX';}
	$message = $_POST['message'];
	$message = str_replace("=", "＝", $message);
	$message = str_replace("#", "＃", $message);

	if (!$message){
		echo ("<div>什么也没说呀</div>");
	}else{
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date('Y-m-d');
	$time = date('H:m:s');
	$sql = "insert into message (ip,uname,message,date,time) values('$ip','$uname','$message','$date','$time');";
	$ret = $conn->query($sql);
	if ($ret == TRUE){echo ' <div>留言成功！</div> ';}
	else{print_r($conn);}
	}

}
?>
<div id = 'dv'>
	看看大家伙都说啥了
	<a href="">刷新</a>
	<a href="index.php">首页</a>
	<table class="table table-condensed">
		<thead>
		<th> 
			 <a href="message.php?by=uname&order=desc">昵</a>
			 <a href="message.php?by=uname&order=asc">称</a>  </th> 
			 <th width = '70%'>留言</th> 
			 <th ><a href="message.php?by=date&order=desc">时</a>
			 <a href="message.php?by=date&order=asc">间</a> </th>
		</thead>
		<tbody>
		<?php
		if ($_GET){
			$by = $_GET['by'];
			$order = $_GET['order'];
			$sql = "select uname,message,date,time from message order by $by $order;";
		}else{
			$sql = "select uname,message,date,time from message order by mid desc;";
		}
		$ret = $conn->query($sql);	
		if ($ret -> num_rows > 0){
			while ( $row = $ret -> fetch_assoc()){
				echo '<tr>
				<th>'.$row['uname'].'</th>
				<th width="60%">'.$row['message'].'</th>
				<th nowrap="nowrap">'.$row['date'].'</th>
				</tr>';
			}
		}
		$conn->close();
		?>
		</tbody>
	</table>
</div>
<script>
// setTimeout(window.location.href='./index.php',3000);
</script>
</body>
</html>
