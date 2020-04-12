<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUINME</title>
    <style>
        body{
            font-size: 30px;
        }
    </style>
</head>
<body>
    <?php
        echo 'hello! php is servering you!<br>';
        $date = date('Y-m-d');
        $time = date('H:i:s');
        echo $date.' '.$time;
        $current_ip = $_SERVER['REMOTE_ADDR'];
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $files = scandir('.');

    ?>
    <div id="box">
        <span><?php 
           echo 'ip:'.$current_ip.'<br>'; 
           echo 'language:'.$language.'<br>';
           echo 'browser:'.$browser.'<br>';
           foreach ($files as $value){
	 echo "<a href='$value'>$value</a><br>";
           }
           ?>
        </span>
    </div>
    <div id="box2" width = '100'>
    </div>
</body>
</html>
