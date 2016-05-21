<?php


//使用表单组件和验证组件
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\validators\FileValidator;
use yii\validators\Validator;
use backend\assets\AppAsset;
use yii\captcha\Captcha;

AppAsset::register($this);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>项目管理系统 by www.mycodes.net</title>
<style type="text/css">

</style>

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


<?php $form = ActiveForm::begin(['method'=>'post','action'=>'index.php?r=login/login']) ?>


    <?= $form->field($model, 'admin')->textInput(['style'=>'width:300px']) ?>&nbsp;&nbsp;
    <?= $form->field($model, 'password')->passwordInput(['style'=>'width:300px']) ?>&nbsp;&nbsp;
    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), ['captchaAction'=>'login/captcha',
    'template' => '<div class="col-lg-3" style="width:200px;height:75px;">{image}</div><div class="col-lg-6" style="width:150px;">{input}</div>']) ?>
 
    <?= Html::a('忘记密码', 'index.php?r=login/forget') ?>
    <?= Html::a('修改密码', 'index.php?r=login/updatepwd') ?>
    <div>
      <?= Html::submitButton('submit', ['class' => 'btn btn-primary']) ?>
 </div>


<?php $form = ActiveForm::end() ?>
<?php $this->endBody() ?>

</body>
</html>