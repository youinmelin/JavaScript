<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no;">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div>
<form action="05_post.php" method="post" enctype="multipart/form-data">
    <label for="file">filename：</label>
    <input type="file" name="file" id="file">
    upload<input type="radio" name="path" id="" value='./upload/'>
    ./<input type="radio" checked name="path" id="" value ='./'>
    rename<input type="checkbox" checked name="rename" value=1>
    <input type="submit" name="submit" value="submit">
</form>
<br>
</div>
    <?php
        // $readfile = readfile('hello.txt');
        // print_r ($readfile) ;
        // echo '<br>echo:'.$readfile ;
        // fclose('hello.txt')
        $isfile = is_file('hello.txt');
        echo '<br>';
        if ($isfile){
            echo 'is a file';
        }else{
            echo 'is not a file';
        }

        echo '<br>';
        echo '<div>';
        $file = fopen('hello.txt','a+');
        fwrite($file, 'Love you dad!<br>');
        fseek($file,0);
        echo fread($file,filesize('hello.txt'));
        echo filetype('hello.txt');
        echo stat('hello.txt');
        fclose($file);
        echo '</div>';
        echo '<br>';
        echo '<div>';
        echo '<br>--------------get files list-----------<br>';
        $files = scandir('./');
        print_r ($files);
        echo '</div>';
        echo '<br>--------------get forecast-----------<br>';
        echo '<div>';
	$content = file_get_contents('http://t.weather.sojson.com/api/weather/city/101010100');
	$con_json = json_decode($content);
	$a = $con_json->{'data'}->{'forecast'}[0];
	var_dump ($a);
        echo '</div>';
    ?>

</body>
</html>
