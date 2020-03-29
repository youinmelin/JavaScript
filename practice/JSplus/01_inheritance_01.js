function Person(options){
	options = options || {}
	this.age = options.age || 20
	this.gender = options.gender || 'male'
	this.name = options.name || 'noname'
}
Person.prototype.speak = function(){
	console.log('I am '+this.name)
}

// var Student = new Person()
function Student (options){
	options = options || {}
	this.score = options.score || 20
	Person.call(this,options)
}
options = {age:19, name:'Lisa', gender:'famale', score:99}
Student.prototype = new Person()
Student.prototype.constructor = Student
var lisa = new Student(options)
lisa.speak()
console.log('lisa',lisa)
