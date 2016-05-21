<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $u_id
 * @property string $user
 * @property string $password
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $selfdesc
 * @property string $experience
 * @property integer $d_id
 * @property string $education
 * @property string $product
 * @property integer $s_id
 * @property string $resume
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['d_id', 's_id'], 'integer'],
            [['user', 'email', 'address', 'resume'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 11],
            [['selfdesc', 'experience', 'education', 'product'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'user' => 'User',
            'password' => 'Password',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'selfdesc' => 'Selfdesc',
            'experience' => 'Experience',
            'd_id' => 'D ID',
            'education' => 'Education',
            'product' => 'Product',
            's_id' => 'S ID',
            'resume' => 'Resume',
        ];
    }
}
