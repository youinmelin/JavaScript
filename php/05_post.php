<?php
	// ���÷�������Ӧ���ļ����ͣ���ʽ�����ַ���
	header('Content-Type:text/html;charset=utf-8');
	// ��ȡ���е�name����
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
