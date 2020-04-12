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
$uname= $_POST['uname'];

$picture = '';
$date = date('Y-m-d');
echo "<div>name:$uname,date:$date</div>";
// database
$servername = 'localhost';
$username = 'youinme';
$password = '123456';
// build connection
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset($conn,'utf8');
// check connectionheader(”Content-type: text/html;charset=utf-8″);
if ($conn->connect_error){
	die('failed:'.$conn->connect_error);
}
$conn->query('use youinme;');
$sql = "insert into user (uname,picture,date) values('$uname','$picture','$date');";
$ret = $conn->query($sql);
if ($ret == TRUE){echo ' <div>注册成功！</div> ';}
else{print_r($conn);}
$conn->close();
?>
<script>
setTimeout(window.location.href='./index.php',3000);
</script>
</body>
</html>
