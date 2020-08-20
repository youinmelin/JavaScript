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
    <script src="jquery-1.12.2.js"></script>
</head>
<body>
	
    <div id="dv"></div>
    <?php
        // echo 'hello! php is servering you!<br>';
        $date = date('Y-m-d');
        $time = date('H:i:s');
        echo 'current time:'.$date.' '.$time.'<br>';
        $current_ip = $_SERVER['REMOTE_ADDR'];
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
	$client = explode(' ',$browser);
	// preg_match("\d",$browser,$matches);
	preg_match("/(?:\()(.*)(?:\))/i",$browser,$matches);
	echo 'device information:'.$matches[0];

    ?>
    <div id="box">
        <span><?php 
           echo 'ip:'.$current_ip.'<br>'; 
           echo 'language:'.$language.'<br>';
           // echo 'browser:'.$browser.'<br>';
           echo 'client:'.substr($client[1],1).'<br>';
	   $f = fopen('count.txt','a+');
	   $count = fread($f,filesize('count.txt'));
	   echo 'visit times:'.$count;
	   fclose($f);
           ?>
        </span>
    </div>
    <div id="box2" width = '100'>
    </div>
	<script>
		var screenWidth = window.screen.width
		var screenHight = window.screen.height;
	   	var platform = navigator.platform;
		console.log(screenWidth,screenHight)
        $('#dv').html('screen size:'+screenWidth+','+screenHight+'<br>platform:'+platform)
	</script>
</body>
</html>
