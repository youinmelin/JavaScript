<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="05_post.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file">
    <input type="submit" name="submit" value="提交">
</form>
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
        $file = fopen('hello.txt','a+');
        fwrite($file, 'Love you dad!<br>');
        fseek($file,0);
        echo fread($file,filesize('hello.txt'));
        echo filetype('hello.txt');
        echo stat('hello.txt');
        fclose($file);
    ?>

</body>
</html>