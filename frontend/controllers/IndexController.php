<?php 
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\LeftModel;


class IndexController extends Controller
{
	public $enableCsrfValidation = false;
      /* 显示  */
	public function actionIndex()
	{
		$model=new LeftModel();
		$type=$model->digui();
		return $this->renderPartial('index.html',array('type'=>$type));
	}

    
}