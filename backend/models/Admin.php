<?php

namespace backend\models;

use Yii;
use yii\validators\Validator;
use backend\models\Adrole;

/**
 * This is the model class for table "admin".
 *
 * @property integer $a_id
 * @property string $admin
 * @property string $password
 * @property string $email
 */
class Admin extends \yii\db\ActiveRecord
{
     public $verifyCode;
     public $newpwd;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin', 'password'], 'required'],
            [['admin', 'password'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            ['verifyCode', 'captcha','message'=>'请输入正确验证码','captchaAction'=>'login/captcha']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a_id' => 'A ID',
            'admin' => '用户名',
            'password' => '密码',
            'email' => '邮箱',
            'verifyCode' => '验证码',
            'newpwd' =>'新密码',
        ];
    }

    /**
     * 给管理员分配角色
     */
    public function assign($post)
    {
        $a_id = $post['id'];
        $adrole = new Adrole();
        //查询用户是否已分配角色
        $adrole_res = $adrole::findOne(['a_id'=>$a_id]);
        if($adrole_res)
        {
            $adrole_res->a_id = $a_id;
            $adrole_res->r_id = $post['r_id'];
            if($adrole_res->save())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            //执行添加操作
            $adrole->a_id = $a_id;
            $adrole->r_id = $post['r_id'];
            if($adrole->save())
            {
                return true;
            }
            else{
                return false;
            }
        }
    }


}
