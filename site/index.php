<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no;">
    <title>Document</title>
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
        这里可以查看终端的基本信息<a href='device_info.php'>click</a>
    </div>
    <div id="box2" >
        这里可以通过输入时间长度和文本，计算每分钟的单词数量<a href='count_words.html'>click</a><br>
    </div>
    <div style="background:lightgreen" id="box3" >
        <form action="sign_up.php" method='post' >
            Input a new name for signing up<input type="text" name="uname" id ="uname">
            <input type="submit" value="OK"  id="sign_btn">
</form> 
            <span id='span_hit'><font color = "red"></font></span>
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
        console.dir(clientInfo)
        var box = document.querySelector('#box')
        // box.innerHTML =  clientInfo.oscpu + '<br>' +  clientInfo.userAgent
        // box.innerHTML = '你好，我是沙河税务所郑林，请用微信扫描二维码，进入个税汇算非接触式服务群，进群后修改个人名称为企业名称，谢谢！'
        $('div').click(function(){
            $(this).animate({'opacity':1,'fontSize':'30px'},'normal')
            console.log($(this))
        })
        $('div').mouseout(function(){
            $(this).animate({'opacity':0.8,'fontSize':'20px'})
        })

        $('#sign_btn').click(function(){
            var username = $('#uname').val()
            if (!username){
                $('#uname').css('backgroundColor','red')
                $('#span_hit').text ('please input your username')
                return false
            }else{
                for(var name in user_arr){
                    if (username == user_arr[name]){
                        var str = ' This name is existed, please change a name.'
                        $('#span_hit').text(str)
                        return false
		    }else
                }
            }
        })

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
	   $f = fopen('count.txt','a+');
	   $count = fread($f,filesize('count.txt'));
	   $count = $count + 1;
	   fclose($f);
	   $f = fopen('count.txt','w+');
	   fwrite($f,$count);
	   fclose($f);

	   $f = fopen('log.txt','a+');
	   $log_content = "$count \t $current_ip \t $client[1] \t $date \t $time\n";
	   fwrite($f,$log_content);
	   fclose($f);

           ?>
        </span>
</body>
</html>
