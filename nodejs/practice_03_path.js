const path = require('path')

// get the last part of the path
console.log(path.basename('/foo/bar/baz/quest.html'))
console.log(path.basename('/foo/bar/baz/quest.html','.html'))

current_path = __dirname
console.log(current_path)
console.log(path.dirname(current_path))
console.log(path.extname('/foo/bar/baz/quest.html'))
let obj = path.parse(__filename)
console.log(obj)
console.log(path.format(obj))
