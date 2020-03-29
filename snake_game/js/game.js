(function () {
    var that
    function Game(map) {
        this.food = new Food()
        this.snake = new Snake()
        this.map = map
        // save Game object
        that = this
    }
    Game.prototype.start = function () {
        // render the snake and food
        this.food.render(this.map) 
        this.snake.render(this.map)
        // game logic 
        // 1. moving
        runSnake()
        // 3.eat
    }
    function runSnake() {
        // create a timer to let snake move continually
        var timerId = setInterval(function (){
        // go one step
        this.snake.move(this.food,this.map)
        this.snake.render(this.map)
        // border judgment 
        var headX = this.snake.body[0].x
        var headY = this.snake.body[0].y
        var maxX = this.map.offsetWidth / this.snake.width 
        var maxY = this.map.offsetHeight / this.snake.height
        if (headX < 0 || headX >= maxX ){
            alert('game over')
            clearInterval(timerId) 
        }
        if (headY < 0 || headY >= maxY ){
            alert('game over')
            clearInterval(timerId) 
        }
        }.bind(that),150)
    }

        // control 
	document.onkeydown = bindKey 
	function bindKey(e){
		console.log(e.code)
		if (e.code == 'ArrowDown' && that.snake.direction != 'up'){
			that.snake.direction = 'bottom'}
		if (e.code == 'ArrowUp' && that.snake.direction != 'down'){
			that.snake.direction = 'top'}
		if (e.code == 'ArrowLeft' && that.snake.direction != 'right'){
			that.snake.direction = 'left'}
		if (e.code == 'ArrowRight' && that.snake.direction != 'left'){
			that.snake.direction = 'right'}
	}
    
    window.Game = Game
})()

// testing
// var map = document.querySelector('#map')
// var game = new Game(map)
// game.start()
