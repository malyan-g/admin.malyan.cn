<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%links}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property integer $sort
 * @property integer $status
 * @property integer $created_at
 */
class Links extends \yii\db\ActiveRecord
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
        return '{{%links}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort', 'status', 'created_at'], 'integer'],
            [['title', 'link'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'link' => '链接',
            'sort' => '排序',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }
}
