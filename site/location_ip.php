<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>根据ip定位</title>
    <!-- <link rel="stylesheet" href="https://a.amap.com/jsapi_demos/static/demo-center/css/demo-center.css"/>  -->
    <!-- <style type="text/css">
       html,body,#container{
           height:100%;
       }
    </style> -->
</head>
<body>
<div id="container"></div>
<div class="info">
    <p id='info'></p>
</div>
<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.15&key=54c8d815a8696ca3a16154947a81543d&plugin=AMap.CitySearch"></script>
<script type="text/javascript">
    //获取用户所在城市信息
    function showCityInfo() {
        //实例化城市查询类
        var citysearch = new AMap.CitySearch();
        //获取IP，返回当前城市
        let IPString = "111.7.100.23";
        IPString = "123.112.20.253";
        IPString = "101.91.60.104";
        citysearch.getCityByIp(IPString,function(status, result) {
            document.getElementById('info').innerHTML = 'IP所在城市：'+ result.city;
        })
    }
    showCityInfo();
</script>
</body>
</html>