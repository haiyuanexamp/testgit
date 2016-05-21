<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "adrole".
 *
 * @property integer $id
 * @property integer $a_id
 * @property integer $r_id
 */
class Adrole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adrole';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_id', 'r_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'a_id' => 'A ID',
            'r_id' => 'R ID',
        ];
    }
}
