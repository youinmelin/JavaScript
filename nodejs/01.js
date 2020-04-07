function sum(n){
    var m = 0
    for (let index = 0; index <n ; index++) {
        m += n
    }
	return m
}
var m = sum(10)
var name = 'youinme'

console.log(m)
console.log(process.argv)
console.log(process.arch)

// export module member
// approach 1
exports.sum = sum
exports.name = name
// approach 2
// module.exports = sum
