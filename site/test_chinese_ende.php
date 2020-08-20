<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $message = "啊马耳他好地方：Malta is a good place."; 
    $message = "将字符串(中文同样实用)转为ascii（注意：我默认当前我们的php文件环境是UTF-8，如果是GBK的话mb_convert_encoding操作就不需要)";
    echo "原文：".$message;
    echo "<br>原文：";
    // for ($i = 0; $i < strlen($message); $i++) {
    //     echo $message[$i];
    // }
    // for ($i = 0; $i < strlen($message); $i++) {
    //     echo ord($message[$i]).".";
    // }
    $ascii = strtoascii($message);
    $ascii = 'AC4E8CBE4DDAACCB0D5CFC2A';
    $string = asciitostr($ascii);

    echo "<br>ASCII:".$ascii ;
    echo "<br>STRING:".$string;

    function strtoascii($str){
    // char to ascii
        $str=mb_convert_encoding($str,'GB2312');
        $change_after='';
        for($i=0;$i<strlen($str);$i++){
            $temp_str=dechex(ord($str[$i]));
            $change_after.=$temp_str[1].$temp_str[0];
        }
        return strtoupper($change_after);
    }

    function asciitostr($sacii){
        $asc_arr= str_split(strtolower($sacii),2);
        $str='';
        for($i=0;$i<count($asc_arr);$i++){
            $str.=chr(hexdec($asc_arr[$i][1].$asc_arr[$i][0]));
        }
        return mb_convert_encoding($str,'UTF-8','GB2312');
    }
    ?>
    
    
</body>
</html>