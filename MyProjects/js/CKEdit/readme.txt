CKEditor的使用示例
　　CKEditor是一个专门使用在网页上属于开放源代码的所见即所得文字编辑器。以前叫FCKEditor。
　　1、到官网下载CKEditor：; ，解压后复制到工程的WEBROOT目录下。
　　2、新建JSP页面，引用其JS文件<script type="text/javascript" src="ckeditor/ckeditor.js"$amp;>amp;$lt;/script>
　　3、用CKEditor替代textarea：
　　<textarea rows="30" cols="50" name="editor01">请输入15x13.</textarea>
　　4、用CKEditor替代textarea，有两种方法，相应的javascript代码如下：
　　在textarea后面加入javascript：
　　<script type="text/javascript">CKEDITOR.replace('editor01');</script>
　　或
　　在加载后调用响应的方法：
　　<script type="text/javascript">
     window.onload = function()
     {
         CKEDITOR.replace( 'editor01' );
     };
 </script>
配置完成，效果如下图：



-----------------------

该编辑器是默认配置，显示了所有工具栏，可使只显示需要的工具栏；编辑框的背景颜色等也可以调整。替代textarea的javascript如下：

　　function window.onload() { //页面加载完成后执行以下表达式 CKEDITOR.replace( 'noticeContent', { uiColor : '#ccccff', toolbar : [ { name: 'document', items : ['Save','DocProps','Preview','Print'] }, { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] }, { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] }, { name: 'basicstyles', items : ['Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] }, { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'] }, { name: 'links', items : [ 'Link','Unlink','Anchor' ] }, { name: 'insert', items: ['Table','HorizontalRule','SpecialChar','PageBreak' ]}, { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] }, { name:'colors', items : [ 'TextColor','BGColor' ] }, { name: 'tools', items : [ 'Maximize' ] } ] }); }
