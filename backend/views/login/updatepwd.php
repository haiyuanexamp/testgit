<?php


//使用表单组件和验证组件
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\validators\FileValidator;
use yii\validators\Validator;
use backend\assets\AppAsset;

AppAsset::register($this);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>项目管理系统 by www.mycodes.net</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php $this->beginBody() ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="147" background="images/top02.gif"><img src="images/top03.gif" width="776" height="147" /></td>
  </tr>
</table>
<table width="562" border="0" align="center" cellpadding="0" cellspacing="0" class="right-table03">
  <tr>
    <td width="221"><table width="95%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
          <tr>
            <td align="center"><img src="images/ico13.gif" width="107" height="97" /></td>
          </tr>
          <tr>
            <td height="40" align="center">&nbsp;</td>
          </tr>
          
        </table></td>
        <td><img src="images/line01.gif" width="5" height="292" /></td>
      </tr>
    </table></td>
    <td>

<?php $form = ActiveForm::begin(['method'=>'post','action'=>'index.php?r=login/updatepwd']) ?>


    <?= $form->field($model, 'admin')->textInput(['style'=>'width=100px']) ?>&nbsp;&nbsp;
    <?= $form->field($model, 'newpwd')->passwordInput(['style'=>'width=60px']) ?>&nbsp;&nbsp;
  
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

<?php $form = ActiveForm::end() ?>
<?php $this->endBody() ?>

</body>
</html>