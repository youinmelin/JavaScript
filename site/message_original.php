<!DOCTYPE html>
<?php
    $expire = time()+60*60*24*7;  // cookie's expire time is 7 days
    if ($_POST){
            setcookie('user', $_POST['uname'],$expire);
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUINME</title>
    <link rel="stylesheet" href="css/main.css">
	<style type="text/css">
        table
        {
            border-collapse: collapse;
            margin: 0 auto;
            text-align: center;
        }
        table td, table th
        {
            border: 1px solid #cad9ea;
            color: #666;
            height: 30px;
        }
        table thead th
        {
            background-color: #CCE8EB;
            width: 200px;
        }
        table tr:nth-child(odd)
        {
            background: #fff;
        }
        table tr:nth-child(even)
        {
            background: #F5FAFA;
        }
		#dv{
			background-color: white;
		}
    </style>
</head>
<body>
<?php
// database
$servername = 'localhost';
$username = 'youinme';
$password = '123456';
// build connection
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset($conn,'utf8');
// check connectionheader('Content-type: text/html;charset=utf-8');
if ($conn->connect_error){
	die('failed:'.$conn->connect_error);
}
$conn->query('use youinme;');
if ($_POST){
	$uname = $_POST['uname'] ;
	if (!$uname){$uname = 'XXX';}
	$message = $_POST['message'];
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
	<table>
	<thead>
	<th>  <a href="message.php?by=uname&order=desc">昵</a><a href="message.php?by=uname&order=asc">称</a>  </th> <th width = '70%'>留言</th> <th ><a href="message.php?by=date&order=desc">时</a><a href="message.php?by=date&order=asc">间</a> </th
	</thead>
	<tbody>
	<?php
	if ($_GET){
		$by = $_GET['by'];
		$order = $_GET['order'];
		$sql = "select uname,message,date,time from message order by $by $order;";
	}else{
		$sql = "select uname,message,date,time from message order by date desc;";
	}
	$ret = $conn->query($sql);	
	if ($ret -> num_rows > 0){
		while ( $row = $ret -> fetch_assoc()){
			echo '<tr><th>'.$row['uname'].'</th><th width="60%">'.$row['message'].'</th><th>'.$row['date'].'</th></tr>';
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
