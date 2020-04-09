<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP -- function</title>
</head>
<body>
    <?php
        $num = 123;
        $str = 'PHP';
        $arry = array('P','H','P');
	$arry_key = array('type'=>'apple','color'=>'red','price'=>'10','place'=>'changping');
	
	function foo($argu){
		if($num > 100){
			echo "$num > 100<br>";}
		return $argu;
	}
	$ret = foo($str);
	echo $ret.'<br>';
	
	//系统函数
	$ret = json_encode($arry);
	echo $ret.'<br>';
	$ret = json_encode($arry_key);
	echo $ret.'<br>';
    ?>

	//系统函数
</body>
</html>
