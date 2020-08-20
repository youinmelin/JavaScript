<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no;">
	<title>YOUINME</title>
	<link rel="stylesheet" href="css/main.css">
    <!-- <script src="js/jquery-1.12.2.min.js"></script> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- <script src="js/bootstrap.min.js"></script> -->
	<style>
	body{
            text-align: center;
            font-size: 15px;
		}
	</style>	
</head>
<body>
<?php
// --------------------
include 'database_enter.php';
$password = "LMa4c7^_DL}fzex3";
// --------------------
// build connection
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset($conn,'utf8');
// check connectionheader('Content-type: text/html;charset=utf-8');
if ($conn->connect_error){
	die('failed:'.$conn->connect_error);
}
$use_query = "use ".$database_name.";";
$conn->query($use_query);

?>
<div id = 'dv'>
	访问记录
	<a href="log_record.php">刷新</a>
	<a href="index.php">首页</a>
	<table class="table table-condensed">
		<thead>
			<th >访问量</th>
			<th> 
				 <a href="log_record.php?by=ip&order=desc">I</a>
				 <a href="log_record.php?by=ip&order=asc">P</a>  </th> 
			 <th >客户端</th> 
			 <th >地址</th> 
			 <th >
				 	<a href="log_record.php?by=date&order=desc">日</a>
				 <a href="log_record.php?by=date&order=asc">期</a>
			 </th>
			 <th >
				 	<a href="log_record.php?by=time&order=desc">时</a>
				 <a href="log_record.php?by=time&order=asc">间</a> 
			</th>
		</thead>
		<tbody>
		<?php
		


		// show
		if ($_GET){
			$by = $_GET['by'];
			$order = $_GET['order'];
			$sql = "select rid,count,ip,client,address,date,time from log_record order by $by $order;";
		}else{
			$sql = "select rid,count,ip,client,address,date,time from log_record order by rid desc;";
		}
		$ret = $conn->query($sql);	
		if ($ret -> num_rows > 0){
			while ( $row = $ret -> fetch_assoc()){

				echo '<tr>
				<th nowrap="nowrap">'.$row['count'].'</th>
				<th nowrap="nowrap">'.$row['ip'].'</th>
				<th nowrap="nowrap">'.$row['client'].'</th>
				<th nowrap="nowrap">'.$row['address'].'</th>
				<th nowrap="nowrap">'.$row['date'].'</th>
				<th nowrap="nowrap">'.$row['time'].'</th>
				</tr>';
				
				if ($row['address'] == '') {
					// get and save address
					// http://ip-api.com/json/115.191.200.34?lang=zh-CN
					// {"status":"success","country":"中国","countryCode":"CN","region":"BJ","regionName":"北京市","city":"北京","zip":"","lat":39.9042,"lon":116.407,"timezone":"Asia/Shanghai","isp":"GWBN-WUHAN's IP","org":"","as":"AS7497 Computer Network Information Center","query":"115.191.200.34"}
					$url = "http://ip-api.com/json/".$row['ip']."?lang=zh-CN"; 
			        $content = file_get_contents($url);
			        $con_json = json_decode($content);
			        $address = $con_json->{'regionName'}.$con_json->{'city'};
		        	$sql = "update log_record set address = '".$address."' where rid = ".$row['rid'].";"; 
			        // echo $sql;
			        $conn->query($sql);
				}


			}
		}
		$conn->close();
		?>
		</tbody>
	</table>
</div>
<script>
// setTimeout(window.location.href='./index.php',3000);
</script>
</body>
</html>
