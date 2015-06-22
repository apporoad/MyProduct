/**
 * Created by Administrator on 15-6-21.
 */

//json
var templateParameter={
    fileName : "",
    description:"",
    creator:"",
    createDate:"",
    sqlcontent:""
};

//解析模板
function AnalysisTempate(template,json)
{
   return Mustache.render(template, json);
}