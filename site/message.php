<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
$uname = $_POST['uname'];
$message = $_POST['message'];
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d');
$time = date('H:m:s');
// echo "<div>name:$uname,date:$date</div>";
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
$sql = "insert into message (ip,uname,message,date,time) values('$ip','$uname','$message','$date','$time');";
$ret = $conn->query($sql);
if ($ret == TRUE){echo ' <div>成功！</div> ';}
else{print_r($conn);}
$conn->close();
?>
<script>
// setTimeout(window.location.href='./index.php',3000);
</script>
</body>
</html>
