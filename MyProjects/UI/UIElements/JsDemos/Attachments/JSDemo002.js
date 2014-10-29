/**
 * Created by apporoad on 2014/10/11.
 */
define(function(require,exports,module){
    var demo001=require("Attachments/JSDemo001");
    //类
    var Animal = new Class({
        initialize: function (name) {
            this.name = name;
        }
    });

    //实例化
    var cat = new Animal("小喵喵");

    var array=[1,23,34,5,6];



    var r=array.filter(function(e){
        return e>10;
    });
    alert(r);

});