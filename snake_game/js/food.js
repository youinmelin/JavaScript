// 自调用函数，开启一个新的作用域，避免全局变量命名冲突
(function () {
    var position = 'absolute'
    var elements = []

    function Food (options){
        options = options || {}
        this.x = options.x || 0
        this.y = options.y || 0
        // 借用构造函数继承属性
        Parent.call(this, options)
        // this.width = options.width || 20
        // this.height= options.height || 20
        this.color = options.color || 'green'
    }
    // 原型继承
    Food.prototype = new Parent()
    Food.prototype.constructor = Food
    
    Food.prototype.render = function (map) {
        // create food 
        remove()
        console.dir(Parent.width)
        var div = document.createElement('div')
        map.appendChild(div)
        elements.push(div)
        this.x = Tools.getRandom(0,map.offsetWidth/this.width - 1) * this.width,
        this.y = Tools.getRandom(0,map.offsetHeight/this.height - 1) * this.height,
        div.style.position = position
        div.style.left = this.x + 'px'
        div.style.top = this.y + 'px'
        div.style.width = this.width  + 'px'
        div.style.height = this.height  + 'px'
        div.style.backgroundColor = this.color
        console.log(this.x)
    }
    function remove(){
        // remove 不是Food的方法，外部不可访问
        for (var i = elements.length -1; i >=0; i--){
            // remove div
            elements[i].parentNode.removeChild(elements[i])
            // remove array element
            elements.splice(i,1)
        }
    }   
    // 通过window顶级对象，让外部可以访问Food
    window.Food = Food
})()

// test
// var map = document.getElementById('map')
// var options = {
//     color:'green'
// }
// var food = new Food(options)
// food.render(map)