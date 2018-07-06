<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article_category}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $name
 * @property integer $created_at
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '所属导航',
            'name' => '名称',
            'created_at' => '创建时间',
        ];
    }

    /**
     * 分类
     * @return array
     */
    public static function categoryArray()
    {
        return self::find()->select(['name'])->indexBy('id')->column();
    }
}
