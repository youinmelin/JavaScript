<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no;">
    <title>YOUINME</title>
    <script src="js/jquery-1.12.2.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <!-- <style>
	body{
            text-align: center;
            font-size: 15px;
		}
	</style> -->	
    <script type="text/javascript">
        function copy() {
        var e = document.getElementById("code");
        e.select(); // 选择对象
        document.execCommand("Copy"); // 执行浏览器复制命令
        alert("密文复制成功！");
    }
    </script>
</head>
<body>
<h3>消息加密和解密</h3>
<h3>encrypt and decrypt messages</h3>
<a href="encrypt_decrypt_input.php">返回</a> &emsp;
<a href="index.php">首页</a><br>
<!-- 
<b>明文</b>：想要发送的原始信息<br>
<b>密文</b>：被加密后的明文<br>
<b>秘钥</b>：一段信息，长度不限，同一套明文和密文需要同一个钥匙进行加密解密<br>
 -->

<?php
// ord() char -> ascii
// chr() ascii -> char
if($_POST) {
    // $key_ascii = ord($_POST["key"]) - 32;
    $key = $_POST["key"];
    if ($_POST["type"] == "encrypt") {
        echo $_POST["type"]."<br>";
        $message = $_POST["message"];
        
        echo "<br>秘钥是：".$key."<br>";
        // echo "原文是：".$message."<br>";

        // echo "key_ascii".$key_ascii."<br>";
        // echo "密文是：";
        $message = strtoascii($message);
        $message_code = encrypt($message, $key);
        $message_verify = asciitostr(decrypt($message_code,$key));
        // echo "解密后原文（用来检验解密正确性）：".$message_verify."<br>";
        if ($_POST["message"] == $message_verify){
            echo "加密成功!<br>";
            echo "密文是：<input type='text' id='code' readonly value='". $message_code. "' >";
            echo "<br><input type='button' onclick='copy();' value='点击复制密文'></input>";
        }else {
            // echo "加密失败，请重试。<br>建议：1.请删除原文中的回车等特殊字符；2.简化秘钥。<br>";
            // echo "加密似乎有问题，请尝试解密，验证加密是否成功<br>";
            echo "加密成功，请尝试解密，验证加密是否成功<br>";
            echo "密文是：<input type='text' id='code' readonly value='". $message_code. "' >";
            echo "<br><input type='button' onclick='copy();' value='点击复制密文'></input>";
        }
 
        // echo "<br>原文长度：".$message_length."，密文长度：".$code_length;


        
    }else {
    // if ($_POST["type"] = "decrypt") {
        echo $_POST["type"]."<br>";
        $code_message = $_POST["message"];
        echo "<br>秘钥是：".$_POST["key"]."<br>";
        // echo "密文是：".$code_message."<br>";

        $origin_message = decrypt($code_message,$key);
        // echo "<br>ASCII原文是：".$origin_message;
        $origin_message = asciitostr($origin_message);

        echo "<br>原文是：".$origin_message;
     }

 }

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
    //  char to ascii 
        $asc_arr= str_split(strtolower($sacii),2);
        $str='';
        for($i=0;$i<count($asc_arr);$i++){
            $str.=chr(hexdec($asc_arr[$i][1].$asc_arr[$i][0]));
        }
        return mb_convert_encoding($str,'UTF-8','GB2312');
    }

    function encrypt($message,$key) {
        $code_length = 0;
        $message_length = strlen($message);
        $message_code = '';
        $key_length = strlen($key);
        
        for($i = 0; $i < $message_length; $i++) {
            // 逐个获取key的每个字符用来运算
            $j = $i % $key_length;
            $key_char = $key[$j];
            // echo $key_char."<br>";
            // 秘钥的ascii码减去32，是因为ASCII码能显示的字符是从32开始的，这样就能让key值从零开始。
            $key_ascii = ord($key_char) - 32;

            $char = $message[$i];
            $char_ascii = ord($char);
            // echo "char_ascii:".$char_ascii."<br>";
            $char_code_ascii = $char_ascii + $key_ascii;
            // echo "char_code_ascii:".$char_code_ascii."<br>";
            // ascii码最大值是126，所以如果密文的ascii码超过126，
            if ($char_code_ascii > 126) {
                // $char_code_ascii = ($char_code_ascii - 126);
                $char_code_ascii = ($char_code_ascii - 126) + 32;
            }
            // echo "char_code_ascii:".$char_code_ascii."<br>";
            if ($char_code_ascii == 60){
                // ascii 60 is "<" so need to transfer it to '&lt;'
                $char_code = "&lt;";
            }elseif ($char_code_ascii == 39) {
                // ascii 39 is "'" so need to transfer it to '&apos;'
                $char_code = "&apos;";
            }
            else {
                $char_code = chr($char_code_ascii);
            }
            // echo $char_code."<br>";
            // echo $char_code;
            $code_length = $i + 1;
            $message_code .= $char_code;
        }
        return $message_code;
    }

    function decrypt($code_message,$key) {
        $key_length = strlen($key);
        $origin_message = "";
        for($i = 0; $i < strlen($code_message); $i++) {
            // 逐个获取key的每个字符用来运算
            $j = $i % $key_length;
            $key_char = $key[$j];
            // echo $key_char."<br>";
            $key_ascii = ord($key_char) - 32;

            $char_code = $code_message[$i];
            // echo "code_char:".$char_code."<br>";
            $char_code_ascii = ord($char_code);
            // echo "char_code_ascii:".$char_code_ascii."<br>";
            
            $char_orgin_ascii = $char_code_ascii - $key_ascii;
            if ($char_orgin_ascii < 32) {
                // $char_orgin_ascii = 126 - ( - $char_orgin_ascii);
                $char_orgin_ascii = 126 - (32 - $char_orgin_ascii);
            }
            
            // echo "char orgin ascii:".$char_orgin_ascii."<br>";
            $origin_message .= chr($char_orgin_ascii);
            // echo chr($char_orgin_ascii);
        }
        // echo "<br>ASCII原文是：".$origin_message;
        return $origin_message;
    }
?>

</body>