<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property integer $b_id
 * @property string $banner
 * @property string $logo
 * @property string $url
 * @property string $adder
 * @property string $area
 * @property string $begintime
 * @property string $endtime
 * @property integer $status
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['begintime', 'endtime'], 'safe'],
            [['status'], 'integer'],
            [['banner', 'logo', 'adder', 'area'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'b_id' => 'B ID',
            'banner' => 'Banner',
            'logo' => 'Logo',
            'url' => 'Url',
            'adder' => 'Adder',
            'area' => 'Area',
            'begintime' => 'Begintime',
            'endtime' => 'Endtime',
            'status' => 'Status',
        ];
    }
}
