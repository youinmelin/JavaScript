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

	if($num > 100){
		echo "$num > 100<br>";}
	if($num == 123){
		echo "$num = 123<br>";}

	$i = 0;
	while ($i < count($arry)){
		echo $arry[$i].'  ';
		$i++;
	}
    ?>

</body>
</html>
