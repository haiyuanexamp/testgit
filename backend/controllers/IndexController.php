<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\web\Session;
use yii;
use backend\models\Privilege;
use backend\models\History;



class IndexController extends CommonController
{
	public $enableCsrfValidation = false;
	  /*显示主页面*/
    public function actionIndex()
    {
    	//unset($_SESSION['id']);exit;

        return $this->renderPartial('index');

    }


    public function actionTop()
    {   
        
        return $this->renderPartial('top');
    }

    public function actionLeft()
    {   
        $session = Yii::$app->session;
        $name = $session['name'];
        //查询所有权限
        $pri = new Privilege();
        $privilege = $pri->recursivePrivilege();
        $arr = array('index','create');
        return $this->renderPartial('left', ['privilege'=>$privilege, 'arr'=>$arr, 'name'=>$name]);
    }

    public function actionMainfra()
    {   
        //查询历史记录
        $a_id = Yii::$app->session->get('id');
        $history = new History();
        $sql = "select * from history where user_id=".$a_id." order by addtime desc limit 10";
        $history_res = $history::findBySql($sql)->all();
        return $this->renderPartial('mainfra', ['history'=>$history_res]);
    }

   
}
?>