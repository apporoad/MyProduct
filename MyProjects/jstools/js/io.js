/**
 * Created by Administrator on 15-6-21.
 */
//name space
var JP=JP || {};
JP.IO=JP.IO || {};

//浏览器版本判断
if(typeof FileReader == "undified") {
    alert("您老的浏览器不行了！");
}

// service file
JP.IO.GetServiceFileContent=function(file,callback){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET",file,false);
    xmlhttp.send();
    var response= xmlhttp.responseText;
    callback(response);
};

//读取 文件内容
JP.IO.ReadFileContent=function(file,callback){
    var content="error!";
    var reader = new FileReader();
    reader.onload = function () {
        content = this.result;
        callback(content);
    };
    reader.readAsText(file);
};


