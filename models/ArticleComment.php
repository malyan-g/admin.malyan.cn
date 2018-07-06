<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article_comment}}".
 *
 * @property integer $id
 * @property integer $article_id
 * @property integer $comment_id
 * @property integer $user_id
 * @property integer $answer_user_id
 * @property integer $praise_num
 * @property string $content
 * @property integer $created_at
 */
class ArticleComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'comment_id', 'user_id', 'answer_user_id', 'praise_num', 'created_at'], 'integer'],
            [['praise_num'], 'required'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => '文章ID',
            'comment_id' => '回复评论ID',
            'user_id' => '用户ID',
            'answer_user_id' => '回复用户ID',
            'praise_num' => '点赞次数',
            'content' => '评论内容',
            'created_at' => '创建时间',
        ];
    }
}
