<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP -- function</title>
</head>
<body>
<div> 
<form action='./05_post.php' method='post'>
	username<input type='text' name='username'>
	password<input type='password' name='password'>
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
	// var_dump ($_SERVER);
	foreach ($_SERVER as $key=>$value){
		echo "<table><tr><th>$key:     </th><th> $value</th></tr></table>";
	}

    ?>
<div>
</body>
</html>
						    	

