<!DOCTYPE html><html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no;">
        <!-- 出处：https://www.php.cn/js-tutorial-388480.html -->
        <title>计算器</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        <style type="text/css">
            *{                
            margin: 0px;                
            padding: 0px;            
            }
            .mytable{                
            border: 1px solid black;                
            border-spacing: 0px;                
            margin: 0 auto; 

            }
            .mytable td{                
            border: 1px solid black;                
            padding: 20px;                
            text-align: center;                
            vertical-align: middle;                
            cursor:pointer !important;            
            }
            td:hover{                
            background-color: lightsteelblue;            
            }
            #content{                
            font-size: 20px;                
            margin: 0 auto; 
                width:262px;                
                /* width:262px;                 */
                background-color:white;            
                }
            .screen{               // screen board 
            height: 80px;                
            padding-right: 8px;                
            /* background-color:lightgreen;                 */
            background-color:rgb(112,131,147);                
            opacity: 0.8;                
            width:80%;
            margin: 0 auto; 
            text-align: right;                
            line-height:50px;                
            font-size: 25px;                
            overflow: hidden;            
            }
            .yellow{                
            background-color:rgb(255,152,62);   // '+-*/'
            }
            .gray{                
            background-color: #808080;   // '='        
             }
        </style>
    </head>
    <body>
    <h2>欢迎使用计算器</h2>
    <!-- <a href="index.php">首页</a><br> -->
    <a class="btn btn-default" href="index.php" role="button">首页</a>
        <p id="content">
            <p class="screen" id="show">0</p>
            <p class="btns">
                <table class="mytable">
                    <tbody id="tbody">

                    </tbody>
                </table>
            </p>
        </p>
        <script type="text/javascript">
            var btns=[
            [
                {text:"AC",id:"btn_C",value:"c",col:1},
                {text:"Del",id:"btn_JJ",value:"✘",col:1},
                {text:"%",id:"btn_BF",value:"%",col:1},
                {text:"÷",id:"btn_CY",value:"/",col:1,cls:"yellow"},
            ],
            [
                {text:"7",id:"btn_C",value:"7",col:1},
                {text:"8",id:"btn_JJ",value:"8",col:1},
                {text:"9",id:"btn_BF",value:"9",col:1},
                {text:"×",id:"btn_CY",value:"*",col:1,cls:"yellow"},
            ],
            [
                {text:"4",id:"btn_C",value:"4",col:1},
                {text:"5",id:"btn_JJ",value:"5",col:1},
                {text:"6",id:"btn_BF",value:"6",col:1},
                {text:"-",id:"btn_CY",value:"-",col:1,cls:"yellow"},
            ],
            [
                {text:"1",id:"btn_C",value:"1",col:1},
                {text:"2",id:"btn_JJ",value:"2",col:1},
                {text:"3",id:"btn_BF",value:"3",col:1},
                {text:"+",id:"btn_CY",value:"+",col:1,cls:"yellow"},
            ],
            [
                {text:"0",id:"btn_C",value:"0",col:2},
                {text:".",id:"btn_JJ",value:".",col:1},
                {text:"=",id:"btn_BF",value:"=",col:1,cls:"gray"},
            ],
            ];            
            function creatUI(config){
                var html=[];                
                for(var i=0,len=config.length;i<len;i++){
                    html.push("<tr>");                    
                    var arry=config[i];                    
                    for(var j=0;j<arry.length;j++)
                    {                        
                    var obj=arry[j];
                        html.push("<td colspan="+obj.col+" class='"+obj.cls+"' v='"+obj.value+"'>"+obj.text+"</td>");
                    }
                    html.push("</tr>");
                }            var b = document.getElementById("tbody");
                b.innerHTML=html.join("");
            }
            creatUI(btns);            //注册点击事件
            var inputs=[];//定义用户输入按钮的数组

            function register(){

                var container=document.getElementById("content");                
                var tds=document.getElementsByTagName("td");                
                var show=document.getElementById("show");                
                for(var i=0,len=tds.length;i<len;i++)
                {                    
                    var block=tds[i];
                    block.onclick=function(){

                        var v=this.getAttribute("v");                        
                        //实现清零功能
                        if(v=="c"){
                            ac();
                            show.innerText="0";                            
                            return ;
                        }
                        inputs.push(v);                        
                        //实现删除功能
                        if(v=="✘"){                            
                        if(inputs.length==0||inputs.length==1)
                            {
                                inputs.length=0;
                                show.innerText='0';
                            }                            
                            else{
                                inputs.length=inputs.length-2;
                            }
                        }                        
                        //检测是不是相邻两个是不是操作符
                        checkNeiber();                        
                        //调用回显的函数
                        echoEcho(show);                        
                        //检测如果已经有两个运算符的话，直接进行计算
                        if(isStartCompute()){                            
                        var result=eval(inputs.join(""));
                            inputs.length=0;
                            inputs[0]=result;
                            show.innerText=result;
                            inputs[1]=temp;                            
                            //show.innerText=result;
                        }                        
                        //如果输入等号，直接让其输出结果
                        if(v=='=')
                        {                            
                        if(inputs.length==1)
                            {
                                inputs.length=0;
                                show.innerText=0;   
                            }         
                        else{
                                inputs.length=inputs.length-1;                                
                                var result=eval(inputs.join(""));
                                inputs.length=0;
                                inputs[0]=result;
                                show.innerText=result;
                                inputs.length=0;
                            }
                        }

                    }
                }
            } 
             //检测到两个操作符的时候，就进行计算
            function isStartCompute(){
                var ctn=0;                
                for(var i=0;i<inputs.length;i++){                    
                var ip=inputs[i];                    
                if(ip=="+"||ip=="-"||ip=="*"||ip=="/"||ip=="%")
                    {
                        ctn++;
                    }                    if(ctn>=2)
                    {
                        temp=inputs[i];
                        inputs.length=inputs.length-1;                        return true;
                    }                    if(ip=="=" && checkNumber(inputs[i+1])){                        
                    var num=inputs[i+1];
                        inputs.length=0;
                        inputs[0]=num;                        
                        return true;
                    }
                }
            } 
             //判断如果是两个相邻的操作符的情况
            function checkNeiber(){
                for(var i=0;i<inputs.length;i++)
                {                    
                if((inputs[i]=="+"||inputs[i]=="-"||inputs[i]=="*"||inputs[i]=="/"||inputs[i]=="%"||inputs[i]=="=")&&(inputs[i+1]=="+"||inputs[i+1]=="-"||inputs[i+1]=="*"||inputs[i+1]=="/"||inputs[i+1]=="%"||inputs[i+1]=="="))
                    {                        
                    var lastKey=inputs[i+1];
                        inputs.length=inputs.length-2;
                        inputs.push(lastKey);                        
                        return ;
                    }
                }
            }   
            function checkNumber(word){
                word=parseInt(word);                
                if(word>0 && word<9){                    
                return true;
                }
            } 
            //清零功能
            function ac(){
                inputs.length=0;
                echoEcho();
            } 
             //增加回显功能
            function echoEcho(showl){
                if(!showl){
                    showl=document.getElementById("show");
                }                if(inputs.length==0){
                    showl.innerText="0";        
                }
                showl.innerText =inputs.join("");
            }
            window.onload = function(){
                register();
            }      
              </script>
    </body>
</html>