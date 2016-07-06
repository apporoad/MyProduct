// import js
//npm install --save write-json-file

var writeJsonFile = require('write-json-file');


var obj={}
obj.name='lxy'
obj.age=23
obj.remark='this is remark'
writeJsonFile('foo.json',obj).then( function() {
    console.log('done');
});