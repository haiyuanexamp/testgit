<?php 
namespace frontend\controllers;
use Yii;
use  app\models\Banner;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class BannerController extends Controller{
	public $enableCsrfValidation = false;
	/*  广告申请页面 */
	public function actionAddbanner(){
		$model=new Banner();
		$db = Yii::$app->db;
		$st = $db->createCommand("select * from region where region_type=1");
		$arr = $st->queryAll();
		return $this->render('jianli',['arr'=>$arr,'model'=>$model]);
	}
	/*  广告添加验证  */
	public function actionAddsbanner(){
		$model=new Banner();
		if($model->load(Yii::$app->request->post())){
			$banner=$_POST['banner'];
			$url=$_POST['url'];
			$adder=$_POST['adder'];
			$area=$_POST['area'];
			$time1=strtotime($_POST['begintime']);
			$time2=strtotime($_POST['endtime']);
			$begintime=date('Y-m-d H:i:s',$time1);
			$endtime=date('Y-m-d H:i:s',$time2);
			$model->logo = UploadedFile::getInstance($model,'logo');
			if($img=$model->upload()){
				//var_dump($img);die;
				$sql="insert into banner (banner,logo,url,adder,area,begintime,endtime)values('$banner','$img','$url','$adder','$area','$begintime','$endtime')";
				$arr=Yii::$app->db->createCommand($sql)->execute();
				if($arr){
					echo "<script>alert('添加成功'); location.href='index.php?r=banner/addbanner'</script>";
				}else{
					echo "<script>alert('添加失败'); location.href='index.php?r=banner/addbanner'</script>";
				}
			}
		}else{
			$db = Yii::$app->db;
			$st = $db->createCommand("select * from region where region_type=1");
			$arr = $st->queryAll();
			return $this->render('jianli',['arr'=>$arr,'model'=>$model]);
		}
		// $a=$model->logo = UploadedFile::getInstance($model, 'logo');
		
	}
	/* 广告列表显示 */
	public function actionListbanner(){
		
	}
}