// files operation
// initialize path
//

const path = require('path')
const fs = require('fs')

let root = '.'
// initialize data
let fileContent = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h2>welcome!!!</h2> 
</body>
</html>`
let initData={
	projectName: 'mydemo',
	data:[{
		name: 'img', type: 'dir'
	},{
		name: 'css',
		type: 'dir'
	},{
		name: 'js',
		type: 'dir'
	},{
		name: 'index.html',
		type: 'file'
	}]
}

// create root dir
fs.mkdir(path.join(root,initData.projectName),(err)=>{
	if(err) return
	// create subdir
	initData.data.forEach((item)=>{
		if(item.type == 'dir'){
			fs.mkdirSync(path.join(root,initData.projectName,item.name))
		}else if(item.type == 'file'){
			//create file and write content
			fs.writeFileSync(path.join(root,initData.projectName,item.name),fileContent)
		}
	})
})
