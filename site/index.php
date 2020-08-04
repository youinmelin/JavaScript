<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no;">
    <title>YOUINME</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        #box2{
            /* text-align:left; */
            background-color: gold;

        }
        #box{
            /* text-align:justify; */
            background-color: rgb(189, 228, 243);
        }
    </style>
    <?php
$user_arr = array();
$servername = 'localhost';
$username = 'youinme';
$password = '123456';
// build connection
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset($conn,'utf8');
// check connection
if ($conn->connect_error){
	die('failed:'.$conn->connect_error);
}
$sql = 'use youinme;';
$conn->query($sql);
$sql = 'select uname from user;';
$ret = $conn->query($sql);
if ($ret -> num_rows > 0){
    while($row = $ret -> fetch_assoc()){
        array_push($user_arr,$row['uname']);
    }
}
$conn->close();
?>
    <script src="jquery-1.12.2.min.js"></script>
</head>
<body>
    <div id="box">
    欢迎使用文件传输系统
    </div>
<?php
	$content = file_get_contents('http://t.weather.sojson.com/api/weather/city/101010100');
	if (strlen($content)>1000){
		echo '<div id="forecast">';
		$con_json = json_decode($content);
		if (date('H') + 0 < 18){
			$w = $con_json->{'data'}->{'forecast'}[0];
			$weather =  '今天天气：'.$w->{'type'}.$w->{'high'}.$w->{'low'}.'风力'.$w->{'fl'}.'<br>'.$w->{'notice'};
		}else{
			$w = $con_json->{'data'}->{'forecast'}[1];
			$weather =  '明天天气：'.$w->{'type'}.$w->{'high'}.$w->{'low'}.'风力'.$w->{'fl'}.'<br>'.$w->{'notice'};
		}
		echo $weather;
		echo '</div>';
	}

?>
    <div id="box2" >
        通过输入时间长度和文本，计算每分钟的单词数量<a href='count_words.html'>click</a><br>
    </div>

    <div style="background:lightgreen" id="box3" >
        <form action="message.php" method='post' >
<?php
    // get username for cookie
    $user = '';
    if (isset($_COOKIE['user'])){
            $user = $_COOKIE['user'];
    }
?>
        请输入昵称:<input type="text" name="uname" id ="uname" value = '<?php echo $user; ?>' ><br>
            请输入留言:<textarea name="message" id="message" cols="30" rows="2"></textarea>
            <input type="submit" value="OK"  id="message_btn">
</form> 
            <span id='span'><font color = "red"></font></span>
    </div>
<div>
    查询终端信息<a href='device_info.php'>click</a><br>
</div>
    <div id="box4"> 
        <?php
            $user_str = '';
            foreach($user_arr as $value){
                $user_str .= $value.' ';
            }
        ?>
        <script>
            var user_str ='<?php echo $user_str; ?>'
            var user_arr = user_str.split(' ')
            console.log(user_arr)
        </script>
    </div>
    <!-- <div id="box4" onclick="window.open('count_words.html','_self')">
        这里可以通过输入时间长度和文本，计算每分钟的语速<br>
    </div> -->
    <script>
        var clientInfo = navigator
        // console.dir(clientInfo)
        $('div').click(function(){
            $(this).animate({'opacity':1,'fontSize':'30px'},'normal')
            $(this).siblings('div').animate({'opacity':0.8,'fontSize':'20px'})
        })
       // $('div').mouseout(function(){
        //     $(this).animate({'opacity':0.8,'fontSize':'20px'})
        // })


        // $('div').mouseenter(function(){
        //     $(this).css('opacity',1).css('fontSize','30px')
        //     console.log($(this))
        // })
        // $('div').mouseleave(function(){
        //     $(this).css('opacity',0.5).css('fontSize','')
        // })
    </script>
     <?php
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $current_ip = $_SERVER['REMOTE_ADDR'];
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
	$client = explode(' ',$browser);
	// preg_match("\d",$browser,$matches);
	preg_match("/(?:\()(.*)(?:\))/i",$browser,$matches);
	// print_r ($matches);
    ?>
    <div id="box">
        <span><?php 
	// Save visitors infomation in log.txt
	   $f = fopen('count.txt','a+');
	   $count = fread($f,filesize('count.txt'));
	   $count = $count + 1;
	   fclose($f);
	   $f = fopen('count.txt','w+');
	   fwrite($f,$count);
	   fclose($f);

	   $f = fopen('log.txt','a+');
	   $log_content = "$count \t $current_ip \t $client[2]$client[3]$client[4]$client[5] \t $date \t $time\n";
	   fwrite($f,$log_content);
	   fclose($f);

           ?>
        </span>
</body>
</html>
