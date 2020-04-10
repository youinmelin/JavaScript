<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP -- function</title>
</head>
<body>
<div> 
<form action=''>
	username<input type='text' name='username'>
	password<input type='text' name='password'>
	<input type='submit' value='login'>
</form>
</div>
<div>

    <?php
        $num = 123;
        $str = 'PHP';
        $arry = array('P','H','P');
	$arry_key = array('type'=>'apple','color'=>'red','price'=>'10','place'=>'changping');
	$f = $_GET['name'];
	print_r ($_GET);
	echo '<br>';
	echo $_GET['age'];
	echo "<br><span>$f</span>";

	

    ?>
<div>
</body>
</html>
						    	

