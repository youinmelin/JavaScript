<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no;">
    <title>YOUINME</title>
    <!-- <script src="js/jquery-1.12.2.min.js"></script> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- <script src="js/bootstrap.min.js"></script> -->
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
        /*
        box is light blue,box2 is light yellow,
        */
    </style>
    <?php
 // --------------------
 include 'database_enter.php';
// read database parameter from file: database.json
// $database_param = file_get_contents('json/database.json');
// // JSON --> array
// $database_array = json_decode($database_param, true);
// $servername = $database_array["servername"];
// $username = $database_array["username"];
$password = "LMa4c7^_DL}fzex3";
// $database_name = $database_array["database_name"];
// $use_query = "use ".$database_name.";";
// --------------------
$user_arr = array();
// build connection
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset($conn,'utf8');
// check connection
if ($conn->connect_error){
	die('failed:'.$conn->connect_error);
}
$conn->query($use_query);
$sql = 'select uname from user;';
$ret = $conn->query($sql);
if ($ret -> num_rows > 0){
    while($row = $ret -> fetch_assoc()){
        array_push($user_arr,$row['uname']);
    }
}
?>
    <script src="/js/jquery-1.12.2.min.js"></script>
	<script src="/js/datetime.js"></script>
</head>

<body onload="start();">
<!--  body onload:当整个html页面加载完成后执行此函数  -->
    <div id="box" > 
    <!-- <div  style="background:lightblue">  -->
    现在是
	<span id="timeDiv"></span> 
    <?php
     // $date_chinese = date('Y年m月d日');
     // echo $date_chinese;?>
    <br>欢迎来到YOUINME小站
    <!-- </div> -->
    </div>
<?php

    $current_ip = $_SERVER['REMOTE_ADDR'];

    // https://www.tianqiapi.com/user/index  天气API控制台  https://www.tianqiapi.com/index/doc
    // $wurl = "https://www.tianqiapi.com/api?version=v9&appid=36391938&appsecret=8vCYiG5t&cityid=101010100"; // 北京天气
    // $wurl = "http://www.tianqiapi.com/api?version=v1&appid=23035354&appsecret=8YvlPNrz";  // 按地址确定当地天气

    $date = date('Y-m-d');
    $sql = "select today,tomorrow from weather where date = '".$date."';";
    $ret = $conn->query($sql);
    $row = $ret -> fetch_assoc();

	if ($ret->num_rows == 0){
        // echo "0";
        $wurl = "https://www.tianqiapi.com/api?version=v9&appid=36391938&appsecret=8vCYiG5t&cityid=101010100"; // 北京天气
        $content = file_get_contents($wurl);
        $con_json = json_decode($content);
        $w = $con_json->{'data'}[0];
        $weather_today =  '今天天气：'.$w->{'wea'}.',最高气温'.$w->{'tem1'}.',最低气温'.$w->{'tem2'}.',风力'.$w->{'win_speed'};
        $w = $con_json->{'data'}[1];
        $weather_tomorrow =  '明日天气：'.$w->{'wea'}.',最高气温'.$w->{'tem1'}.',最低气温'.$w->{'tem2'}.',风力'.$w->{'win_speed'};

        $sql_insert = "insert into weather (today,tomorrow,date) values('".$weather_today."','".$weather_tomorrow."','".$date."');";
        // echo $sql_insert;
        $conn->query($sql_insert);

        echo '<div id="forecast">';

        if (date('H') + 0 < 18){
            echo $weather_today;
        }else{
            echo $weather_tomorrow;
        }
        // echo $weather;
        echo '</div>';

    }
	if ($ret->num_rows == 1){
        // echo $ret->num_rows;
		echo '<div id="forecast">';

		if (date('H') + 0 < 18){
            echo $row['today'];
		}else{
            echo $row['tomorrow'];
		}
		// echo $weather;
		echo '</div>';
	}


?>
<!-- <div style="background:tan"> -->
<div style="background:lightgreen">
    北斗卫星定位 
    <!-- <a class="btn btn-success btn-sm" href='location.php'>进入</a> -->
    <a class="btn btn-success btn-sm" href='location.php'>进入</a>
</div>

<!-- <div  style="background:gold"> -->
<div  style="background:khaki">
    消息加密和解密 
    <a class="btn btn-warning btn-sm" href='encrypt_decrypt_input.php'>进入</a>
</div>

<div id="box" > 
    通过输入时间长度和文本，计算每分钟的单词数量 
    <a class="btn btn-primary btn-sm" href='count_words.html'>进入</a><br>
</div>

<div style="background:khaki">
    小小计算器 
    <a class="btn btn-warning btn-sm" href='calculator.php'>进入</a>
    <!-- <a class="btn btn-default" href="index.php" role="button">首页</a> -->
    <!-- <input type="button" href='calculator.php' class="btn btn-warning btn-sm" value="进入" > -->
    <!-- <button type="button" href='calculator.php' class="btn btn-warning btn-sm"  >进入</button> -->
</div>

<div style="background:lightgreen" id="box" >
   <form action="message.php" method='post' >
<?php
    // get username for cookie
    $user = '';
    if (isset($_COOKIE['user'])){
            $user = $_COOKIE['user'];
    }
?>
请输入昵称:<input type="text" name="uname" id ="uname" value = '<?php echo $user; ?>' ><br>
请输入留言:<textarea name="message" id="message" cols="20" rows="2"></textarea>
            <input type="submit" class="btn btn-success" value="OK"  id="message_btn">
            <!-- <button type="s" class="btn btn-success">（成功）Success</button> -->
</form> 
            <span id='span'><font color = "red"></font></span>
</div>

<!-- <div>
查询终端信息<a href='device_info.php'>click</a><br>
</div> -->

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
<!--     <div id="box">
        <span> -->
    <?php 
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

        $sql = "insert into log_record values(
        null, 
        '$count', 
        '$current_ip', 
        '',
        '$client[2]$client[3]$client[4]$client[5]', 
        '$date',
        '$time',
        '');";
        $conn->query($sql);

        $conn->close();
   ?>
        <!-- </span> -->
</body>
</html>
