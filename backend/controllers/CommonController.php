<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\web\Session;
use yii;
use yii\helpers\Url;



class CommonController extends Controller
{  
   public $url;

	public function init()
	{     
         //开启session
         $session = Yii::$app->session;
         $session->open();
         $u_id=$_SESSION['id'];
         if(!$u_id)
         {
            echo "<script>alert('请先登录/(ㄒoㄒ)/~~');location.href='index.php?r=login/login'</script>";
            exit;
         }
            //print_r($_SERVER);
            $this->url = $_SERVER['REQUEST_URI'];
	}
}
?>