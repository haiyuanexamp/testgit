<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>分配管理员角色</title>
<link rel="stylesheet" rev="stylesheet" href="css/style.css" type="text/css" media="all" />


<script language="JavaScript" type="text/javascript">
function tishi()
{
  var a=confirm('数据库中保存有该管理员角色信息，您可以修改或保留该信息。');
  if(a!=true)return false;
  window.open("冲突页.htm","","depended=0,alwaysRaised=1,width=800,height=400,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}

function check()
{
document.getElementById("aa").style.display="";
}


function link(){
   document.getElementById("fom").action="index.php?r=admin/assign";
   document.getElementById("fom").submit();
}



</script>
<style type="text/css">
<!--
.atten {font-size:14px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
  <form action="index.php?r=admin/assign" method="post" enctype="multipart/form-data" name="fom" id="fom" target="sypost" >
  <input type="hidden" name="id" value="<?php echo $admin['a_id'];?>" />
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >分配角色页面</th>
  </tr>
  <tr>
    <td class="CPanel">
		
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
		<tr><td align="left">
			<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
		</td></tr>

		<TR>
			<TD width="100%">
				<fieldset style="height:100%;">
				<legend>分配角色</legend>
					  <table border="0" cellpadding="2" cellspacing="1" style="width:100%">
					 
					  <tr>
					    <td nowrap align="right" width="13%"><font size="2" style="font-weight:bold" >管理员:</font></td>
					    <td width="41%"><?php echo $admin['admin'];?></td>
					    </tr>
					  <tr>
					    <td nowrap align="right"><font size="2" style="font-weight:bold" >角&nbsp;&nbsp;&nbsp;色:</font></td>
					    <td>
                           <!-- 角色展示 -->
                           <?php foreach($role as $key => $v){ ?>
                           	   &nbsp;&nbsp;<input type="radio" name="r_id" value="<?php echo $v['r_id'];?>" <?php if($adrole){if(in_array($v['r_id'], $adrole)){ echo "checked"; }}?> />
                           	   &nbsp;
                           	   <?php echo $v['role'];?>
                           <?php } ?>
					    </td>
					    </tr>
					  </table>
			 <br />
				</fieldset>			</TD>
		</TR>
		
		</TABLE>
	
	
	 </td>
  </tr>
  

		
		
		
		
		<TR>
			<TD colspan="2" align="center" height="50px">
			<input type="submit" name="Submit" value="保存" class="button"/>　
			
			<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/></TD>
		</TR>
		</TABLE>
	
	
	 </td>
  </tr>
  
  
  
  
  </table>

</div>
</form>
</body>
</html>
