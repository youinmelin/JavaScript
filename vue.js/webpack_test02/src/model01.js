
var add = function (x, y) {
    debugger
    return x + y
}

var add2 = function (x, y) {
    return x + y + 2
}

// 导出add
module.exports.add = add
// 导出多个：module.exports = {add,add2}