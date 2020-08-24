<?php

$servername = 'localhost';

$username = 'uqg987bx46';

$password = '';

// build connection

$conn = new mysqli($servername, $username, $password);

mysqli_set_charset($conn,'utf8');

// check connection

if ($conn->connect_error){

	die('failed:'.$conn->connect_error);

}



$sql = 'use test;';

$conn->query($sql);

$sql = 'create table user (uid int(5),uname varchar(20),picture varchar(200),date date);';

$conn->query($sql);

print_r($conn);

if ($conn->query($sql) === TRUE){

	echo 'build database sucessed';

}else{

	echo 'build database failed';

}

// $conn->close();

$sql = 'select uname from user;';

$ret = $conn->query($sql);

echo '<br>--------------select-------------------<br>';

print_r ($ret);

echo '<br>';

print_r ($ret->fetch_assoc());

print_r ($ret->fetch_assoc());

print_r ($ret->fetch_assoc());

$row = $ret->fetch_assoc();

$uname = $row['uname'];

echo '<br>'.$uname;



?>

<!--

 build database

 mysqli Object (

 [affected_rows] => -1 

 [client_info] => mysqlnd 5.0.7-dev - 091210 - $Revision: 304625 $ 

  [client_version] => 50007 

  [connect_errno] => 0 

  [connect_error] => 

  [errno] => 1050 

  [error] => Table 'user' already exists 

  [field_count] => 0 

  [host_info] => localhost via TCP/IP 

  [info] => 

  [insert_id] => 0 

  [server_info] => 5.0.41-community-nt-log 

  [server_version] => 50041 

  [sqlstate] => 42S01 

  [protocol_version] => 10 

  [thread_id] => 32 

  [warning_count] => 0 

 )

-->

<!--

--------------select-------------------

mysqli_result Object ( [current_field] => 0 [field_count] => 4 [lengths] => [num_rows] => 6 [type] => 0 ) 

-->

