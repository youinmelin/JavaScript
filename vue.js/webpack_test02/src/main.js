// webpack打包的入口文件

// 导入model01.js
var {add} = require("./model01")
var Vue = require("./vue.min")


var VM = new Vue({
    el:'#app',
    data:{
        name:'youinme',
        num1:0,
        num2:0,
        result:0,
        url_youinme:'https://www.youinme.top/path.php',
        size:20
    },
    methods: {
        change: function(){
            // 使用成员变量前要加this
            // this.result = Number.parseInt(this.num1) + Number.parseInt(this.num2)
            this.result = add(Number.parseInt(this.num1) , Number.parseInt(this.num2))
            // alert("计算结果：" + this.result)
        },
        set_zero: function(){
            this.result = 0;
            this.num1 = 0;
            this.num2 = 0;
        }
    }
})