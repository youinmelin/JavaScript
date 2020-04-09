class Machine{
	constructor(type,price,num){
		this.type = type
		this.price = price
		this.num = num
	}
	showSum(){
		console.log(`${this.type} total price is ${this.price * this.num}.`)
	}
}

let washmachine = new Machine('wash_machine',1000,5)
washmachine.showSum()
class Car extends Machine{
	constructor(type,price,num,color){
		super(type,price,num)
		this.color = color
	}
	showColor(){
		console.log(`${this.type},color is ${this.color}.`)
	}
}
let qq = new Car('QQ',60000,2,'green')
qq.showColor()
qq.showSum()

