<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$form = ActiveForm::begin(['method'=>'get','action' => 'index.php?r=tests/lists']);
?>

 <div class="form-group">
			<input type="text" name="sou" value="<?php echo $sou;?>">
            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
 </div>
 <?php ActiveForm::end() ?>
<table border="1" width="30%">
<tr >
	<td>姓名</td>
	<td>年龄</td>
	<td>操作</td>
</tr>
<?php foreach($res as $v) {?>
<tr>
	<td><?php echo $v['name'];?></td>
	<td><?php echo $v['age'];?></td>
	<td><a href="index.php?r=tests/dels&id=<?php echo $v['id'];?>">删除</a> || <a href="?r=tests/pd/<?php echo $v['id'];?>">修改</a></td>
</tr>
<?php }?>
</table>
<?php echo LinkPager::widget([
  'pagination' => $pages,
]);?>
<script src="././jquery.js"></script>
<script>
	// function fun(){
	// 	var s=document.getElementById('sou').value;
	// 	var xhr=new XMLHttpRequest();
	// 	xhr.open('get','index.php?r=tests/search&name='+s);
	// 	xhr.send();
	// 	xhr.onreadystatechange=function(){
	// 		if(xhr.readyState==4&&xhr.status==200){
	// 			document.getElementById('div1').innerHTML=xhr.responseText;
	// 		}
	// 	}
	// }
//搜索分页
$(document).on("click",".button",function(){
	name=$("#sou").val()
	//alert(name);
	$.get("index.php?r=tests/lists&name="+name,function(data){
		$("#div1").html(data);
	})
})



</script>

