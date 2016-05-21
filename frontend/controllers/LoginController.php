<?php 
namespace frontend\controllers;
use yii\web\Controller;
use yii;

use frontend\models\LeftModel;


class LoginController extends Controller
{
	public $enableCsrfValidation = false;
    /* 登录/登录验证 */
	public function actionLogin()
	{
		if(empty($_POST))
		{			
			return $this->renderPartial('login.html');
		}
		else
		{
			//接受传递的值
			$posts = \Yii::$app->request->post();
			//var_dump($posts);die;
			$email = $posts['email'];
			$password = md5($posts['password']);
			$typeLogin = $posts['typeLogin'];
			$autoLogin = isset($posts['autoLogin']) ? $posts['autoLogin'] : 1 ;
			//判断验证那个表
			if($typeLogin == 1)
			{
				//公司账号登陆,验证company表
				$country = \Yii::$app->db;
				$command = $country->createCommand("SELECT * FROM company where email='$email' and password='$password'");
				$rows = $command->queryAll();
				//有数据验证成功
				if($rows)
				{
					$session = \Yii::$app->session;
					$session->open();
					$session->destroy();
					//验证成功,判断是否记住密码
					if($autoLogin == 0)
					{
						//记住密码,设置session
						$session = \Yii::$app->session;
						$session->open();
						//设置session
						$session->set('autoLogin', $email);
					
					}				
				echo "<script>alert('公司账号登陆成功');location.href='index.php?r=index/index'</script>";
				}
				else 
				{
					//验证失败
					echo "<script>alert('用户名或密码错误!!');location.href='index.php?r=login/login'</script>";
				}
			} 
			else 
			{
				//个人账号登陆.验证user表
				$country = \Yii::$app->db;
				$command = $country->createCommand("SELECT * FROM user where email='$email' and password='$password'");
				$rows = $command->queryAll();
				//有数据验证成功
				if($rows)
				{
					$session = \Yii::$app->session;
					$session->open();
					$session->destroy();
					//验证成功,判断是否记住密码
					if($autoLogin == 0)
					{
						//记住密码,设置session
						$session = \Yii::$app->session;
						$session->open();
						//设置session
						$session->set('autoLogin', $email);
					
					}
				echo "<script>alert('个人账号登陆成功');location.href='index.php?r=index/index'</script>";
				
				} 
				else 
				{
					//验证失败
					echo "<script>alert('用户名或密码错误!!');location.href='index.php?r=login/login'</script>";
				}
			}
		}	
		$model=new LeftModel();
		$type=$model->digui();
		return $this->renderPartial('index.html',array('type'=>$type));
	}
	/*注册*/
	public function actionRegister()
	{
		if($_POST)
		{
			//接收数据
			$email=$_POST['email'];
			$type=$_POST['type'];
			$password=md5($_POST['password']);
            //找公司
			if($type==1)
			{
				//查询数据
	            $a=	Yii::$app->db;
	            $row=$a->createCommand("select * from company where email='$email'")->execute();
	            //判断是否已有该用户
	            if($row)
	            {
	                echo "<script>alert('已有账号，可直接登陆');location.href='index.php'</script>";
	            }
	            else
	            {
	                $a->createCommand()->insert("company",['email'=>$email,'password'=>$password])->execute(); 
	                return $this->redirect("index.php");
	            }  
			}
			//找用户
		    else
		    { 
                //查询数据
	            $a=	Yii::$app->db;
	            $row=$a->createCommand("select * from user where email='$email'")->execute();
	            //判断是否已有该用户
	            if($row)
	            {
	                echo "<script>alert('已有用户，可直接登陆');location.href='index.php'</script>";
	            }
	            else
	            {
	                $a->createCommand()->insert("user",['email'=>$email,'password'=>$password,'type'=>$type])->execute();
	                return $this->redirect("index.php");
	            }  
		    }
		}
		else
		{
			return $this->renderPartial('register.html');
		}
	}
	/*忘记密码*/
	public function actionReset()
	{
		if($_POST)
		{
			$email=$_POST['email'];
			var_dump($email);
		}
		else
		{
			return $this->renderPartial('reset.html');
		}
	}
	/* 退出 */
	public function actionLogout()
	{
		$session = \Yii::$app->session;
		$session->open();
		$session->destroy();
		echo "<script>alert('退出成功');location.href='index.php?r=login/login'</script>";
	}

}