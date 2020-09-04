<?php 
	// 脑筋急转弯测试
	// http://api.tianapi.com/txapi/naowan/index?key=6786b9576117d10dd28bebbdea48297d
	// {"code":200,"msg":"success","newslist":[{"quest":"什么人骗别人也骗自己?","result":"骗子"}]}

 include 'database_enter.php';
 // build connection

$conn = new mysqli($servername, $username, $password);

mysqli_set_charset($conn,'utf8');

// check connection

if ($conn->connect_error){

	die('failed:'.$conn->connect_error);

}

$conn->query($use_query);
	 $sql = "select content from lunarday where date = '".$date."';";

    $ret = $conn -> query($sql);

    

    if ($ret -> num_rows > 0){

        // echo "get data from database";

        $row = $ret -> fetch_assoc();

        $con_json = json_decode($row['content']);

        echo "".$date_chinese.$con_json->{'newslist'}[0]->{'cnweekday'}." ".$con_json->{'newslist'}[0]->{'lunarmonth'}.$con_json->{'newslist'}[0]->{'lunarday'}." ".$con_json->{'newslist'}[0]->{'holiday'};

    }else {

        // echo "get data from api";

         // $durl = "http://api.tianapi.com/txapi/jiejiari/index?key=6786b9576117d10dd28bebbdea48297d&";

        $dateInfo = file_get_contents($durl);

        $con_json = json_decode($dateInfo);

        echo $con_json->{'code'};

        if ($con_json->{'code'} == 200){

            $sql = "insert into lunarday (content, date) values( '".$dateInfo."', '".$date."');";

            $conn->query($sql);

            echo "".$date_chinese.$con_json->{'newslist'}[0]->{'cnweekday'}." ".$con_json->{'newslist'}[0]->{'lunarmonth'}.$con_json->{'newslist'}[0]->{'lunarday'}." ".$con_json->{'newslist'}[0]->{'holiday'};

        }else{

            // echo $con_json->{'code'};

            echo '';

        }

    }
 ?>
