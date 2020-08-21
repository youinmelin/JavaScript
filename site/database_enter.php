<?php
    $database_param = file_get_contents('../database.json');
    $key = "sfaycnycf258shy2";
    // $database_param = decrypt($database_param, $key);
    
    // JSON --> array
	$database_array = json_decode($database_param, true);
    // echo $database_array["username"]."<br>";
	$servername = $database_array["servername"];
	$username = $database_array["username"];
    // echo $username;
    // $password = decrypt($database_array["password"],$key);
    $password = "(LMa4c7^_DL}fx3";
	$database_name = $database_array["database_name"];
	$use_query = "use ".$database_name.";";


    // function encrypt($message,$key) {
    //     $code_length = 0;
    //     $message_length = strlen($message);
    //     $message_code = '';
    //     $key_length = strlen($key);
        
    //     for($i = 0; $i < $message_length; $i++) {
    //         // 逐个获取key的每个字符用来运算
    //         $j = $i % $key_length;
    //         $key_char = $key[$j];
    //         // echo $key_char."<br>";
    //         // 秘钥的ascii码减去32，是因为ASCII码能显示的字符是从32开始的，这样就能让key值从零开始。
    //         $key_ascii = ord($key_char) - 32;

    //         $char = $message[$i];
    //         $char_ascii = ord($char);
    //         // echo "char_ascii:".$char_ascii."<br>";
    //         $char_code_ascii = $char_ascii + $key_ascii;
    //         // echo "char_code_ascii:".$char_code_ascii."<br>";
    //         // ascii码最大值是126，所以如果密文的ascii码超过126，
    //         if ($char_code_ascii > 126) {
    //             // $char_code_ascii = ($char_code_ascii - 126);
    //             $char_code_ascii = ($char_code_ascii - 126) + 32;
    //         }
    //         // echo "char_code_ascii:".$char_code_ascii."<br>";
    //         if ($char_code_ascii == 60){
    //             // ascii 60 is "<" so need to transfer it to '&lt;'
    //             $char_code = "&lt;";
    //         }elseif ($char_code_ascii == 39) {
    //             // ascii 39 is "'" so need to transfer it to '&apos;'
    //             $char_code = "&apos;";
    //         }
    //         else {
    //             $char_code = chr($char_code_ascii);
    //         }
    //         // echo $char_code."<br>";
    //         // echo $char_code;
    //         $code_length = $i + 1;
    //         $message_code .= $char_code;
    //     }
    //     return $message_code;
    // }

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