<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nav}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $name
 * @property string $url
 * @property integer $sort
 * @property integer $status
 * @property integer $created_at
 */
class Nav extends \yii\db\ActiveRecord
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
        return '{{%nav}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'sort', 'status', 'created_at'], 'integer'],
            [['created_at'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '父级ID',
            'name' => '名称',
            'url' => '地址',
            'sort' => '排序',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }
}
