<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $nickname
 * @property string $avatar
 * @property integer $status
 * @property integer $created_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * 正常
     */
    const STATUS_ACTIVE = 1;
    /**
     * 禁用
     */
    const STATUS_DISABLE = 2;

    public static $statusArray = [
        self::STATUS_ACTIVE => '正常',
        self::STATUS_DISABLE => '禁用'
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at'], 'integer'],
            [['username', 'nickname'], 'string', 'max' => 20],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash'], 'string', 'max' => 255],
            [['avatar'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => '身份验证码',
            'password_hash' => '密码',
            'nickname' => '昵称',
            'avatar' => '头像',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }
}
