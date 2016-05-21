<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\db\ActiveRecord; 
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
    public $logo;
    public function rules()
    {
        return [
            [['begintime', 'endtime'], 'safe'],
            [['status'], 'integer'],
            [['banner','adder', 'area'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 255],
            [['logo'],'file','skipOnEmpty' => false, 'extensions' => 'png, jpg','mimeTypes' => 'image/jpeg, image/png',]
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
            'logo' => '广告logo :',
            'url' => 'Url',
            'adder' => 'Adder',
            'area' => 'Area',
            'begintime' => 'Begintime',
            'endtime' => 'Endtime',
            'status' => 'Status',
        ];
    }

    public function upload(){
        if ($this->validate()) {
            //echo 1;die;
            $this->logo->saveAs('uploads/' . $this->logo->baseName . '.' . $this->logo->extension);
            return $this->logo->baseName . '.' . $this->logo->extension;
            //return true;
        
        } else {
            //echo 2;die;
            return  false;
        }
    }
}
