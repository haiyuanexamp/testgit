<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $j_id
 * @property integer $t_id
 * @property integer $c_id
 * @property string $request
 * @property string $tempt
 * @property string $addtime
 * @property string $jobdesc
 * @property string $adder
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_id', 'c_id'], 'integer'],
            [['addtime'], 'safe'],
            [['jobdesc'], 'string'],
            [['request'], 'string', 'max' => 200],
            [['tempt'], 'string', 'max' => 100],
            [['adder'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'j_id' => 'J ID',
            't_id' => 'T ID',
            'c_id' => 'C ID',
            'request' => 'Request',
            'tempt' => 'Tempt',
            'addtime' => 'Addtime',
            'jobdesc' => 'Jobdesc',
            'adder' => 'Adder',
        ];
    }
}
