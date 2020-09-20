Vue.js webpack

# 安装
## 简单方法：
	网页中直接引入vue.js
	<script src="vue.min.js"></script>
## 对于大型项目的方法
		使用npm管理依赖，借助webpack打包工具
- step1： install Node.js
	验证：node -v
- step2: 设置npm
	node自带 npm
	验证：npm -v
	查询包路径： npm config ls
	修改路径：
		- 在node.js的目录下，创建npm_modules和npm_cache
		- npm config set prefix "d:\Program Files\nodejs\npm_modules"
		- npm config set cache "d:\Program Files\nodejs\npm_cache"
- step3：安装cnpm（供中国加速用）-g 全局安装
	npm install -g cnpm --registry=https://registry.npm.taobao.org
	验证： cnpm -v
	如果nrm没有安装则需要进行全局安装：cnpm install -g nrm
- step4：安装webpack
	webpack安装分为本地安装和全局安装：
	本地安装：仅将webpack安装在当前项目的node_modules目录中，仅对当前项目有效。
    	npm install --save-dev webpack 或 cnpm install --save-dev webpack
		cnpm install --save-dev webpack@3.6.0   指定版本
		cnpm install --save-dev webpack-cli	(4.0以后的版本需要安装webpack-cli)
	全局安装：对所有项目有效，全局安装会锁定一个webpack版本，该版本可能不适用某个项目。全局安装需要添加 -g 参数
		npm install webpack -g 或 cnpm install webpack -g
	验证：webpack
	
# 使用
## vue.js语法：
```html
<body>
<div id="app">
{{name}}
 <!‐‐ 在Vue接管区域中使用Vue的系统指令呈现数据这些指令就相当于是MVVM中的View这个角色 ‐‐>
<!-- v-model 在表单控件或者组件上创建双向绑定 仅能在如下元素中使用：input select textarea components(Vue组件)-->
	<input type="text" v-model="size">
<!-- v-text 能够解决插值表达式闪烁的问题 -->
	<span v-text="name"></span>
 <!-- v-bind单向绑定，将数据对象绑定在dom的任意属性中（比v-model范围广） -->
	<img v-bind:src="path">
	<!-- 缩写：<img :src="path"> -->
	<span :style="{ fontSize: size + 'px' }">v-bind绑定到style属性</span>
<!-- v-on绑定事件 -->
	<button v-on:click="methods.func">计算</button>
	<!-- 用@代替v-on的缩写形式 -->
	<button @click="methods.func">计算</button>

	<!-- 遍历数组 key="主键" -->
            <li v-for="(item, index) in list12345":key="index" v-if="index % 2 == 0">
                <span v-text="item"></span>:
                <span v-text="index"></span>
            </li>
            <span v-for="(item) in list12345" >
                <span v-text="item"></span>
            </span><br>
            <li v-for="(value,key) in user">
                {{key}}:{{value}}
            </li>
</div>
</body>
<script>
    // 实例化Vue对象
    //vm :叫做MVVM中的 View Model
    var VM = new Vue({
        el:"#app",//表示当前vue对象接管app的div区域
        data:{
            name:'name value'// 相当于是MVVM中的Model这个角色
			path:'../img/',
			list12345:[1,2,3,4,5],  // 数组
            user:{uname:'lin',age:10},  // 对象
			methods:{
				func: functin(){
					alert('hello')
				}
			}
        }
    });

```
</script>

## 利用webpack分模块开发
html文件和js脚本分开开发，将所有js方法打包到统一的js文件中
- 1. 建立model01.js，编写方法，并声明导出
    - ES 5 语法：
    - 单独导出： module.exports.add = add
    - 批量导出：module.exports = {add,add2}
- 2. 建立入口文件：main.js 文件名随意
    - 声明导入
    - var {add} = require("./model01")
    - var Vue = require("./vue.min")
- 3. 执行webpack打包程序
    - 进入当前目录的命令行窗口，执行"webpack main.js build.js"
    - 会打包成build.js文件
- 4. 使用webpack包
    - 在html页面文件中引入刚生成的文件 <script src="build.js"></script>
	
## 利用webpack-dev-server
webpack-dev-server开发服务器，它的功能可以实现热加载 并且自动刷新浏览器。
### 安装和配置webpack-dev-server
- 安装
使用 webpack-dev-server需要安装webpack、 webpack-dev-server和 html-webpack-plugin三个包。
在项目文件夹下运行：
``` 
cnpm install webpack@3.6.0 webpack-dev-server@2.9.1 html-webpack-plugin@2.30.1 --save-dev
```
- 配置
	- 1. 在package.json中添加：
	```json
	"scripts": {
		"dev": "webpack-dev-server --inline --hot --open --port 5008"
	},
	//   --inline：自动刷新
	//   --hot：热加载
	//   --port：指定端口
	//   --open：自动在默认浏览器打开
	//   --host：可以指定服务器的 ip，不指定则为127.0.0.1，如果对外发布则填写公网ip地址
	```
	- 2. 配置webpack.config.js
	在当前目录下创建 webpack.config.js， webpack.config.js是webpack的配置文件。
	在此文件中可以配置应用的入口文件、输出配置、插件等，其中要实现热加载自动刷新功能需要配html-webpack-plugin插件
	```js
	var htmlwp = require('html‐webpack‐plugin');
	module.exports={
    	entry:'./src/main.js',  //指定打包的入口文件
    	output:{
        path : __dirname+'/dist',  // 注意：__dirname表示webpack.config.js所在目录的绝对路径
        filename:'build.js'    //输出文件     
    	},
    	plugins:[
        	new htmlwp({
           	 title: '首页',  //生成的页面标题<head><title>首页</title></head>
           	 filename: 'index.html', //webpack‐dev‐server在内存中生成的文件名称，自动将build注入到这个页面底部，才能实现自动刷新功能
           	 template: 'vue_02.html' //根据index1.html这个模板来生成(这个文件请程序员自己生成)
       		 })
   		 ]
	}
	```
- 使用
命令行输入: npm run dev
启动成功后会自动打开browser或者输入提示信息中的网址
