<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "privilege".
 *
 * @property integer $p_id
 * @property string $privilege
 * @property integer $parent_id
 * @property string $controller
 * @property string $action
 */
class Privilege extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'privilege';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['privilege', 'parent_id', 'controller', 'action'], 'required'],
            [['parent_id'], 'integer'],
            [['privilege', 'controller', 'action'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'P ID',
            'privilege' => 'Privilege',
            'parent_id' => 'Parent ID',
            'controller' => 'Controller',
            'action' => 'Action',
        ];
    }

    /**
     * 递归方式查询权限
     */
    public function recursivePrivilege()
    {
        $connection = \Yii::$app->db;
        $top=$command = $connection->createCommand('SELECT * FROM privilege')->queryAll();
        //return $top;
        return $this->digui($top, $parent_id=0);
    }
    
    public function digui($top, $parent_id)
    {   
        $child = array();
        foreach ($top as $key => $v)
        {
            if($v['parent_id'] == $parent_id)
            {
                $child[] = $v;
            }
        }
        if(empty($child))
        {
            return  null;
        }
        foreach($child as $key => $v)
        {
            $second = $this->digui($top, $v['p_id']);
            if($second)
            {
                $child[$key]['child'] = $second;
            }
        }
        return $child;
    }


}
