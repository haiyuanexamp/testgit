<?php
namespace backend\controllers;
use backend\models\Admin;
use yii\base\Security;
use yii\web\Session;
use yii\web\Controller;
use yii;

class LoginController extends Controller
{
    public $layout='login';
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'width'=>150,
                'height'=>75, 
            ],
        ];
    }
    public function actionAa(){
      var_dump(md5('123456'));
    }
    /*登录页面*/
    public function actionLogin()
    {
      if($_POST)
      {
         //开启session
         $session = Yii::$app->session;
         $session->open();
         //接收数据
         $a=Yii::$app->request->post();
         $admin=$a['Admin']['admin'];
         $password=md5($a['Admin']['password']);
         //查询数据库
         $login=Yii::$app->db;
         $row=$login->createCommand("select * from admin where `admin`='$admin' and password='$password'")->queryone();
         //var_dump($row);die;

         //是否登陆成功
          if($row)
          {
             $session = Yii::$app->session;
             $session->open();
             $session['id'] = $row['a_id'];
             $session['name'] = $row['admin'];
             echo "<script>alert('登陆成功');location.href='index.php?r=index/index'</script>";
          }
          else
          {
             echo "<script>alert('用户名或密码错误');location.href='index.php?r=login/login'</script>";  
          }
      }
      else 
      {
         $login=new Admin();
         return $this->render("login",["model"=>$login]);
      }
  }
  /*忘记密码*/ 
  public function actionForget()
  {
     if($_POST)
     {
         $session = Yii::$app->session;
         $session->open();
         $id=$_SESSION['id'];

        //内容加密
        $lock=new Security();
        $str=$lock->encryptByKey($id,'123');
        $str=base64_encode($str);
       
         //接收邮箱
         $a=Yii::$app->request->post();
         $email=$a['Admin']['email'];
         //发送邮箱
         $mail= Yii::$app->mailer->compose();  
         $mail->setTo($email);  
         $mail->setSubject("找回登陆密码");  
         $url="http://www.job.com/backend/web/index.php?r=login/pwd&a_id=".$str;
         //发送数据内容
         $mail->setTextBody($url); 
         if($mail->send()) 
         {
            echo "已发送邮箱中，点击进行验证";  
         }
         else  
         {
            echo "邮箱发送失败";  
         }
     }
     else
     {
         $login=new Admin();
         return $this->renderPartial("forget",["model"=>$login]);
     }
  }
   //判断id是否存在，若是直接登陆，否则跳转修改
   public function actionPwd()
   {
      //接收值
      $str=Yii::$app->request->get('a_id'); 
      //解密
      $lock=new Security();
      $str=base64_decode($str);
      $str=$lock->decryptByKey($str,'123'); 
      //查询数据库
      $login=Yii::$app->db;
      $row=$login->createCommand("select * from admin where `a_id`='$str'")->queryone();
      if($row)
      {
          echo "<script>alert('登陆成功');location.href='index.php?r=index/index'</script>";
      }
      else
      {
         echo "<script>alert('对不起，请重置密码');location.href='index.php?r=login/updatepwd'</script>"; 
      }
   } 
   //修改密码
   public function actionUpdatepwd()
   {
        if($_POST)
        { 
          //接收数据
         $a=Yii::$app->request->post();
         $admin=$a['Admin']['admin'];
         $newpwd=md5($a['Admin']['password']);
         //修改密码
         $login=Yii::$app->db;
         $rows=$login->createCommand()->update("admin",['password'=>$newpwd],"admin='$admin'")->execute();
         return  $this->redirect("index.php?r=login/login");
        }
        else
        {
           $login=new Admin();
           return $this->renderPartial("updatepwd",["model"=>$login]);
        }     
  }
  //退出
  public function actionLoginout()
  {
      unset($_SESSION['id']);
      $login=new Admin();
      return $this->render("login",["model"=>$login]);
  }
}
