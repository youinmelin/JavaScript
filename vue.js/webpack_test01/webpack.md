## 分模块开发
将html文件和js脚本分开开发，将所有js方法打包到统一的js文件中
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
