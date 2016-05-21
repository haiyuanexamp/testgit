<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>项目管理系统 by www.mycodes.net</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 1px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #4AA3D8;
}
html { overflow-x: ; overflow-y: ; border:0;} 
-->
.history_box {
  position:fixed;
  bottom:0;
  right:10px;
  width:200px;
  height: 500px;
  border: 1px solid #000000;
}

</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#4AA3D8"></td>
  </tr>
  <tr>
    <td><table width="768" height="500" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top"><img src="images/welcome.gif" width="768" height="536" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<div class="history_box" >
<h3>游览历史</h3>
<?php if($history){?>

<?php foreach($history as $key=>$v){?>
   <a href="<?php echo $v['url'];?>"><p><?php echo $v['title'];?></p></a>
<?php }?>
<?php }else{ ?>
  暂无游览历史
<?php }?>
</div>
</body>
</html>
