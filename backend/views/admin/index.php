<?php
use yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理员列表</title>
<style type="text/css">
<!--
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
.tabfont01 {    
    font-family: "宋体";
    font-size: 12px;
    color: #555555;
    text-decoration: none;
    text-align: center;
}
.font051 {font-family: "宋体";
    font-size: 12px;
    color: #333333;
    text-decoration: none;
    line-height: 20px;
}
.font201 {font-family: "宋体";
    font-size: 12px;
    color: #FF0000;
    text-decoration: none;
}
.button {
    font-family: "宋体";
    font-size: 14px;
    height: 37px;
}
#tableTitle td {
    font-family: "宋体";
    font-size: 16px;
    font-weight: bold;
}
.tableContent td {
    font-family: "宋体";
    font-size: 14px;
    font-weight: bold;
}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/xiangmu.js"></script>
</head>
<SCRIPT language=JavaScript>
function sousuo(){
    window.open("gaojisousuo.htm","","depended=0,alwaysRaised=1,width=800,height=510,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}
function selectAll(){
    var obj = document.fom.elements;
    for (var i=0;i<obj.length;i++){
        if (obj[i].name == "delid"){
            obj[i].checked = true;
        }
    }
}

function unselectAll(){
    var obj = document.fom.elements;
    for (var i=0;i<obj.length;i++){
        if (obj[i].name == "delid"){
            if (obj[i].checked==true) obj[i].checked = false;
            else obj[i].checked = true;
        }
    }
}

function deleteAll(){
   /*var obj = document.fom.elements;
   var str = '';
   for(var i=0;i<obj.length;i++){
       if(obj[i].name == "delid"){
           if(obj[i].checked==true){
              str += obj[i].value;
           }
       }
   }
   alert(str);*/
   alert(1);
}


function link(){
    document.getElementById("fom").action="xiangmu.htm";
   document.getElementById("fom").submit();
}

</SCRIPT>

<body>
<form name="fom" id="fom" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

             <tr>
               <td height="20"><span class="newfont07">选择：<a href="#" class="right-font08" onclick="selectAll();">全选</a>-<a href="#" class="right-font08" onclick="unselectAll();">反选</a></span>
                  <input name="Submit" type="button" class="right-button08" value="删除所选项" onclick="deleteAll();" />
                  <input name="Submit2" type="button" class="right-button08" value="添加管理员" onclick="location.href='index.php?r=admin/create'"/></td>
             </tr>
              <tr>
                <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">

                                      <tr>
                    <td height="20" colspan="13" align="center" bgcolor="#EEEEEE"class="tablestyle_title">管理员列表</td>
                    </tr>
                  <tr id="tableTitle" >
                    <td  align="center" bgcolor="#EEEEEE">选择</td>
                    <td  height="20" align="center" bgcolor="#EEEEEE">id</td>
                    <td  align="center" bgcolor="#EEEEEE">管理员</td>
                    <td  align="center" bgcolor="#EEEEEE">邮箱</td>                    
                    <td  align="center" bgcolor="#EEEEEE">操作</td>
                  </tr>
                  <?php if(!$admin){?>
                      <tr class="tableContent" >
                          <td colspan="5">没有记录</td>
                      </tr>
                  <?php }else{?>
                  <?php foreach($admin as $key=>$v){?>
                  <tr align="center" class="tableContent" >
                    <td bgcolor="#FFFFFF"><input type="checkbox" name="delid" value="<?php echo $v['a_id'];?>" /></td>
                    <td height="20" bgcolor="#FFFFFF"><?php echo $v['a_id'];?></td>
                    <td bgcolor="#FFFFFF"><?php echo $v['admin'];?></td>
                    <td bgcolor="#FFFFFF"><?php echo $v['email'];?></td>
                    <td bgcolor="#FFFFFF"><a href="index.php?r=admin/update&id=<?php echo $v['a_id']?>">编辑</a> || <a href="index.php?r=admin/assign&id=<?php echo $v['a_id']?>">分配角色</a></td>
                  </tr>
                  <?php }?>
                  <?php }?>                  
            </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33">
          <!-- 展示分页 -->
          <?= LinkPager::widget(['pagination'=>$page]);?>
         </td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
</html>
