<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $c_id
 * @property string $company
 * @property string $password
 * @property string $phone
 * @property string $email
 * @property string $c_name
 * @property string $address
 * @property string $logo
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company', 'password'], 'required'],
            [['company', 'email', 'c_name', 'address', 'logo'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'company' => 'Company',
            'password' => 'Password',
            'phone' => 'Phone',
            'email' => 'Email',
            'c_name' => 'C Name',
            'address' => 'Address',
            'logo' => 'Logo',
        ];
    }
}
