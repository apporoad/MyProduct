npm adduser

//publish
package.json:
{
    "name":"your packageName,Global unique",
    "version":"1.0.0",
    "dependencies":{
        "argv":"0.0.2"
    },
    "main":"your main in",
    "bin":{
        "cmd application name":"main module position"
    }
}

//package.json所在目录下运行npm publish发布代码了

//语义版本号分为X.Y.Z三位，分别代表主版本号、次版本号和补丁版本号
+ 如果只是修复bug，需要更新Z位。
+ 如果是新增了功能，但是向下兼容，需要更新Y位。
+ 如果有大变动，向下不兼容，需要更新X位。