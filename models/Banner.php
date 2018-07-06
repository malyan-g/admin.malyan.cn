<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $describe
 * @property integer $sort
 * @property integer $status
 * @property integer $created_at
 */
class Banner extends \yii\db\ActiveRecord
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
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort', 'status', 'created_at'], 'required'],
            [['sort', 'status', 'created_at'], 'integer'],
            [['url', 'describe'], 'string', 'max' => 80],
            [['title'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => '图片',
            'title' => '标题',
            'describe' => '描述',
            'sort' => '排序',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }
}
