class Animal{
	// 静态方法，不能通过实例调用，只能通过类名调用
	static showInfo(){
		console.log('This is an Animal class')
	}
	// 构造函数，包含属性
	constructor(name){
		this.name = name
	}

	showName(){
		console.log(`I'm ${this.name}.`)
	}
}

let dog = new Animal('dog')
dog.showName()
Animal.showInfo()

// 类的继承extends
class Cat extends Animal{
	constructor(name,color){
		super(name)  // super用来调用父类
		this.color = color
	}

	showMe(){
		console.log(`I am ${this.name}, my color is ${this.color}.`)
	}
}

let cat = new Cat('cat','white')
cat.showMe()
Cat.showInfo()
