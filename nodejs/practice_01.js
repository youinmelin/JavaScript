var a = 1, b = 2, c = 3
var [a,b,c] = [1,2,3]
var [d,e,f] = [,'eee',]

console.log(a,b,c)
console.log(d,e,f)

var [a,b,c,d] = 'hello'
console.log(a,b,c,d)

console.log('hello world'.includes('hello',0))

let arr1 = [1,2,3]
let arr2 = [4,5,6]
// 用扩展运算符合并数组
let arr3 = [...arr1,...arr2]
let arr4 = arr1 + arr2
console.log(arr3)
console.log(typeof(arr4),arr4)

let foo = (a) => a
console.log(foo('hello'))
let fn = () => console.log('hello again')
fn()
let fn2 = a => a*10
console.log(fn2('5'))

let arry = ['a','b','c','d','e']
arry.forEach(function(element,index){
	console.log(element,index)
})
arry.forEach(foo = (element,index) => console.log(element,index))
arry.forEach((element,index) => console.log(element,index))
