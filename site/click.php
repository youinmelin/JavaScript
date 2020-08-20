<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
      function copy() {
          var e = document.getElementById("copy");
          e.select(); // 选择对象
          document.execCommand("Copy"); // 执行浏览器复制命令
          alert("复制成功！");
          }
    </script>
</head>'
<body>
   <h1>topic</h1> 
   <input type="button" id="btn" value="show">
   <input type="button" id="btn2" value="show2">
   <!-- <textarea id='copy'>https://blog.csdn.net/yuzsmc</textarea> -->
   <!-- <input type="text" value="wechat111" id="copy" style="opacity: 0" readonly> -->
   <input type="text" value="wechat111" id="copy" readonly>

   <input type='button' onclick='copy();' value='点击复制'></input><br>




   <div id="box">

   </div>
   <div id="box2"></div>
   <div class="careers-slide slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 1903px;" tabindex="0">
    <img src="https://www.spacex.com/sites/all/themes/spacex2012/images/dragon/slideshow/Dragon_Carousel_0001_8.jpg" alt="">
  </div>
   <script>
       var btn = document.querySelector('#btn')
       btn.onclick = function(){
            // create element p
            var p = document.createElement('p')
            console.log(p)
            // modify element's attribute
            p.innerHTML = 'created me'
            p.style.color = 'red'
            // put element p into DOM TREE
            var box = document.querySelector('#box')
            box.appendChild(p)
       }
       var datas=['xishi','diaochan','fengjie','furongjiejie']
       var btn2 = document.querySelector('#btn2')
       btn2.onclick = function(){
           var ul = document.createElement('ul')
            var box2 = document.querySelector('#box2')
            box2.appendChild(ul)
            for (var i=0;i<datas.length;i++){
                var li = document.createElement('li')
                li.innerText = datas[i]
                ul.appendChild(li)
                //o鼠标悬停，高亮显示
                li.onclick = liMouseOver
                li.onclich = liMouseOut

                }
       }
       function liMouseOver(){
           this.style.backgroundColor = 'green'

       }
       function liMouseOut(){
           this.style.backgroundColor = ''

       }
   </script>

<?php
//将内容进行UNICODE编码，编码后的内容格式：\u56fe\u7247 （原始：图片）
function unicode_encode($name)
{
    $name = iconv('UTF-8', 'UCS-2', $name);
    $len = strlen($name);
    $str = '';
    for ($i = 0; $i < $len - 1; $i = $i + 2)
    {
        $c = $name[$i];
        $c2 = $name[$i + 1];
        if (ord($c) > 0)
        {    // 两个字节的文字
            $str .= '\u'.base_convert(ord($c), 10, 16).base_convert(ord($c2), 10, 16);
        }
        else
        {
            $str .= $c2;
        }
    }
    return $str;
}
 
// 将UNICODE编码后的内容进行解码，编码后的内容格式：\u56fe\u7247 （原始：图片）
function unicode_decode($name)
{
    // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
    $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
    preg_match_all($pattern, $name, $matches);
    if (!empty($matches))
    {
        $name = '';
        for ($j = 0; $j < count($matches[0]); $j++)
        {
            $str = $matches[0][$j];
            if (strpos($str, '\\u') === 0)
            {
                $code = base_convert(substr($str, 2, 2), 16, 10);
                $code2 = base_convert(substr($str, 4), 16, 10);
                $c = chr($code).chr($code2);
                $c = iconv('UCS-2', 'UTF-8', $c);
                $name .= $c;
            }
            else
            {
                $name .= $str;
            }
        }
    }
    return $name;
}
 
//测试用例：
 
//编码
$name = '图片';
echo '<h3>'.unicode_encode($name).'</h3>';
 
//解码
echo '<h3>'.unicode_decode('\u56fe').'</h3>';
?>
</body>
</html>
