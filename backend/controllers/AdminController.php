<?php

namespace backend\controllers;

use Yii;
use backend\models\Admin;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Role;
use backend\models\Adrole;
use yii\data\Pagination;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends CommonController
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $query = Admin::find()->where('a_id != 1');
        $page = new Pagination([
              'totalCount' => $query->count(),
              'defaultPageSize' => 5,
            ]);
        $admin = $query->limit($page->limit)->offset($page->offset)->asArray()->all();
        return $this->render('index', ['admin'=>$admin,'page'=>$page]);
    }

    /**
     * Displays a single Admin model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admin();

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->a_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
        
        if (Yii::$app->request->post() && $model->validate()) {
            return $this->redirect(['view', 'id' => $model->a_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }


    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->a_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * 管理员分配角色
     */
    public function actionAssign()
    {   
        
            if(Yii::$app->request->ispost)
            {
                $model = new Admin();
                $post = Yii::$app->request->post();
                if($model->assign($post))
                {
                  return $this->redirect(['index']);
                }
                else
                {
                echo "<script>alert('分配失败');location.href='index.php?r=admin/index'</script>";
                }
            }
            else
            {   
                $id = Yii::$app->request->get('id')??'';
                if(!$id)
                {
                    return $this->redirect(['index']);
                }
                else
                {
                    //查询所有角色
                    $role = Role::find()->asArray()->all();
                    //根据用户id查询用户所有的角色
                    $sql = "select r_id from adrole where a_id=".$id;
                    $adrole = Adrole::findBySql($sql)->asArray()->one();
                    //print_r($adrole);exit;
                    //查询管理员信息
                    $admin = Admin::find()->where(['a_id'=>$id])->asArray()->one();
                    return $this->render('assign', ['role'=>$role, 'adrole'=>$adrole, 'admin'=>$admin]);
                }
                
            }


        
        
        
    }



    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
