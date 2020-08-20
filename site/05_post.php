<?php
	// 设置服务器响应的文件类型（格式）和字符集
	header('Content-Type:text/html;charset=utf-8');
	// 获取表单中的name属性
	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	$path = $_POST['path'];
	$rename = $_POST['rename'];
	echo $uname.'<br>';
	echo $pwd.'<br>';
	echo $path.'<br>';
	echo $rename.'<br>';
	if ($uname=='admin' && $pwd=='admin'){
		echo 'login sucessfully';
	}else{
		echo 'login failed';}

	if ($_FILES['file']['error']>0){
		echo 'error:'.$_FILES['file']['error'].'<br>';}
	else{
		print_r ($_FILES);
		$temp_name = $_FILES['file']['tmp_name'];
		if ($rename){
			$filename = $path.date('mdHis').'-'.$_FILES['file']['name'];
		}else{
			$filename = $path.$_FILES['file']['name'];
		}
		$copy_ret = copy($temp_name,$filename);
		if($copy_ret){ echo 'sucessed';
		}else{print_r($copy_ret);}	
	}

?>
