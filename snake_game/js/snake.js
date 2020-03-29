// 自调用函数，开启一个新的局部作用域，防止命名冲突

(function () {
  var position = 'absolute';
  var elements = []
  function Snake(options) {
    options = options || {};
    // size of every part of the snake
    Parent.call(this, options)
    // this.width = options.width || 20;
    // this.height = options.height || 20;
    // direction
    this.direction = options.direction || 'right';
    // 蛇的身体(蛇节)  第一个元素是蛇头
    this.body = [
      {x: 3, y: 2, color: 'red'},
      {x: 2, y: 2, color: 'blue'},
      {x: 1, y: 2, color: 'blue'}
    ];
  }

  Snake.prototype = new Parent()
  Snake.prototype.constructor = Snake

  Snake.prototype.render = function (map) {
    // remove previous snake
    remove()
    // 把每一个蛇节渲染到地图上
    for (var i = 0, len = this.body.length; i < len; i++) {
      // 蛇节
      var object = this.body[i];
      // 
      var div = document.createElement('div');
      map.appendChild(div);
      elements.push(div)
      // 设置样式
      div.style.position = position;
      div.style.width = this.width + 'px';
      div.style.height = this.height + 'px';
      div.style.left = object.x * this.width + 'px';
      div.style.top = object.y * this.height + 'px';
      div.style.backgroundColor = object.color;
    }
  }

  function remove() {
    // del element form list,start by the last one 
    for (var i = elements.length-1; i >= 0 ; i--) {
      // del div
        elements[i].parentNode.removeChild(elements[i])
      // del element
      elements.splice(i,1)
    }
  }
  Snake.prototype.move= function (food,map) {
    // move bodies
    for(var i = this.body.length - 1;i>0;i--) {
      this.body[i].x = this.body[i-1].x
      this.body[i].y = this.body[i-1].y
    }
    // move head
    var head = this.body[0]
    switch(this.direction){
      case 'right':
        head.x += 1
        break
      case 'left':
        head.x -= 1
        break
      case 'top':
        head.y -= 1
        break
      case 'bottom':
        head.y += 1
        break
    }
    eat(this.body, food, map)
  }
  function eat(body, food, map) {
    headX = body[0].x
		headY = body[0].y
		foodX =  food.x/food.width
		foodY =  food.y/food.width
		if (headX == foodX && headY == foodY){
	// get the last part of the snake
      var last = {}
      extend(body[body.length - 1],last)
      body.push(last)
      console.log(elements.length)
			food.render(map)
		}
  }

  // copy object
  function extend(parent,child){
	  for (var key in parent){
		  // do not copy the attribute if existed
		  if (child[key]){
			  continue
		  }
	  child[key] = parent[key]
	  }
  }

    
  // 暴露构造函数给外部
  window.Snake = Snake;
})()

// test code
// var map = document.getElementById('map');
// var snake = new Snake();
// snake.render(map);
