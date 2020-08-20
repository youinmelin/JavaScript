<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>北斗定位</title>
      <link rel="stylesheet" href="https://a.amap.com/jsapi_demos/static/demo-center/css/demo-center.css" />
    <style>
        html,body,#container{
            height:100%;
        }
        .info{
            width:29rem;
        }
    </style>
<body>
<!-- 高德提供的接口 -->
  
<div id='container'></div>
<div class="info">
    <h3 id='status'></h3>
    <hr> <!-- 分割线 -->
    <h3 id='result'></h3>
    <!-- <p >由于众多浏览器已不再支持非安全域的定位请求，为保位成功率和精度，请升级您的站点到HTTPS。</p> 
        我在高德开发者平台申请的key：54c8d815a8696ca3a16154947a81543d
        document:https://lbs.amap.com/api/javascript-api/guide/services/geolocation
-->
</div>
<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.15&key=54c8d815a8696ca3a16154947a81543d"></script>
<script type="text/javascript">
    // 创建地图对象，显示地图
    var map = new AMap.Map('container', {
        resizeEnable: true
    });
    // 地图初始化加载的定位只能获取到城市级别信息，如果想获取到具体的位置就要借助浏览器定位。高德JS API提供了AMap.Geolocation插件来实现定位
    AMap.plugin('AMap.Geolocation', function() {
        var geolocation = new AMap.Geolocation({
            enableHighAccuracy: true,//是否使用高精度定位，默认:true
            // GeoLocationFirst: true, // 调整PC端为优先使用浏览器定位，失败后使用IP定位
            timeout: 20000,          //超过xx毫秒后停止定位，默认：5s
            maximumAge: 2000, // 缓存毫秒数。定位成功后，定位结果的保留时间
            buttonPosition:'RB',    //定位按钮的停靠位置,RB表示右下
            buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            zoomToAccuracy: true,   //定位成功后是否自动调整地图视野到定位点

        });
        map.addControl(geolocation);
        geolocation.getCurrentPosition(function(status,result){
            // result为GeolocationResult 对象
            // document:https://lbs.amap.com/api/javascript-api/reference/location#m_GeolocationResult
            if(status=='complete'){
                onComplete(result) // 定位成功时触发此事件
            }else{
                onError(result) // 定位失败时触发此事件
            }
        });
    });
    //解析定位结果
    function onComplete(data) {
        document.getElementById('status').innerHTML='定位成功,您的设备支持北斗卫星定位'
        var str = [];
        let satellitesNum = randomNum(12, 22);
        let satellitesStrong = randomNum(satellitesNum - 5, satellitesNum - 1);
        let satellitesWeak = satellitesNum - satellitesStrong;
        str.push('搜到'+satellitesNum+'颗北斗卫星，其中强信号'+satellitesStrong+'颗，弱信号'+satellitesWeak+'颗');
        // str.push('搜索到19颗北斗卫星，其中强信号15颗，弱信号4颗');
        str.push('您的位置：' + data.formattedAddress); // 返回逆向地址具体位置
        // str.push('您的位置信息：' + data.addressComponent);  // 返回对象
        // str.push('定位信息：' + data.message);  // 返回 Get ipLocation success.Get address success.
        // str.push('ip 地址：' + data.position);
        // str.push('定位类别：' + data.location_type);
        if(data.accuracy){
             str.push('精度：' + data.accuracy + ' 米');
        }//如为IP精确定位结果则没有精度信息
        // str.push('是否经过偏移：' + (data.isConverted ? '是' : '否'));
        document.getElementById('result').innerHTML = str.join('<br>');
    }
    //解析定位错误信息
    function onError(data) {
        document.getElementById('status').innerHTML='定位失败'
        document.getElementById('result').innerHTML = '失败原因排查信息:'+data.message;
    }

    //生成从minNum到maxNum的随机数
    function randomNum(minNum,maxNum){ 
        switch(arguments.length){ 
            case 1: 
                return parseInt(Math.random()*minNum+1,10); 
            break; 
            case 2: 
                return parseInt(Math.random()*(maxNum-minNum+1)+minNum,10); 
            break; 
                default: 
                    return 0; 
                break; 
        } 
    } 
</script>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8"> 
<title>菜鸟教程(runoob.com)</title> 
</head>
<body>
<p id="demo">点击按�