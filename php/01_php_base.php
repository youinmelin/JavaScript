<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $num = 123;
        $str = 'PHP';
        $arry = array('P','H','P');
        echo  'type:$str';
        echo '<div> hello'.$num.'</div>';
        echo '<div> hello</div>';
        echo "<div> hello $str </div>";
        print_r ($arry);
        echo '<br>';
        var_dump($arry);
        echo '<br>';
        var_dump($str);
        echo '<br>';
	foreach($arry as $item){
		echo $item.'<br>';
	}
	for ($i=0;$i<count($arry);$i++){
		echo $i.': '.$arry[$i].', ';} 
        echo '<br>';
	$arry_key = array('type'=>'apple','color'=>'red','price'=>'10','place'=>'changping');
	foreach($arry_key as $key=>$value){
		echo $key.'==>>'.$value.'<br>';}
    ?>
</body>
</html>
