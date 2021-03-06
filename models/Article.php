<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property integer $author
 * @property integer $category_id
 * @property integer $browse_num
 * @property integer $comment_num
 * @property integer $praise_num
 * @property integer $status
 * @property integer $created_at
 */
class Article extends \yii\db\ActiveRecord
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
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'category_id', 'browse_num', 'comment_num', 'praise_num', 'status', 'created_at'], 'integer'],
            [['praise_num'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => '作者',
            'category_id' => '类型',
            'browse_num' => '浏览次数',
            'comment_num' => '评论次数',
            'praise_num' => '点赞次数',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if($this->isNewRecord){
            $this->author =Yii::$app->user->id;
            $this->created_at = time();
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttach()
    {
        return $this->hasOne(ArticleAttach::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }
}
