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
    <style>
	body{
            text-align: center;
            font-size: 15px;
		}
	</style>	
</head>
<body>
<h3>消息加密和解密</h3>
<h3>encrypt and decrypt messages</h3>
<a href="index.php">首页</a><br>

<h3>加密encrypt</h3>
<form action="encrypt_decrypt_english.php" method="post" id="form1">
请输入原始信息：<br>
<textarea name="message" id="message" cols="30" rows="2"></textarea><br>
请输入秘钥（长度不限，英文区分大小写，不能是中文）：<br>
    <input type="text" name="key" id="key"><br>
    <input type="hidden" name="type" value="encrypt">
    <input type="submit" value="OK"  id="btn">
    <button type="reset" id="reset">clear</button>
</form>

<h3>解密decrypt</h3>
<form action="encrypt_decrypt_english.php" method="post" id="form2">
请输入密文信息：<br>
<textarea name="message"  cols="30" rows="2"></textarea><br>
请输入秘钥：<br>
    <input type="text" name="key"><br>
    <input type="hidden" name="type" value="decrypt">
    <input type="submit" value="OK"  id="btn">
    <button type="reset" id="reset">clear</button>
</form>
<h3>说明：</h3>
<b>明文</b>：想要发送的原始信息<br>
<b>密文</b>：被加密后的明文<br>
<b>秘钥</b>：一段信息，长度不限，同一套明文和密文需要同一个秘钥进行加密解密<br>
<b>使用方法</b>：双方私下提前约定一串信息作为秘钥，信息发送者用该秘钥加密并发送密文给接受者（不要发送秘钥），信息接收者用约定好的秘钥进行解密，即可还原成原文。
</body>