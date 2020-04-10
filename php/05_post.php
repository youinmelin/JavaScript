<?php
	// 设置服务器响应的文件类型（格式）和字符集
	header('Content-Type:text/html;charset=utf-8');
	// 获取表单中的name属性
	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	echo $uname.'<br>';
	echo $pwd.'<br>';
	if ($uname=='admin' && $pwd=='admin'){
		echo 'login sucessfully';
	}else{
		echo 'login failed';}

	if ($_FILES['file']['error']>0){
		echo 'error:'.$_FILES['file']['error'].'<br>';}
	else{
		print_r ($_FILES);}

?>
