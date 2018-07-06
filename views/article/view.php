<?php

use yii\helpers\Markdown;
use yii\helpers\HtmlPurifier;
use app\components\widgets\DetailView;

/* @var $model \app\models\Article */

$this->title = Yii::t('module', 'Article') . Yii::t('common', 'View Title');
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'attach.title',
        ['attribute' => 'attach.content', 'format' => 'raw', 'value' => function($model){
            return Markdown::process($model->attach->content, 'gfm-comment');
        }],
        ['attribute' => 'category.name', 'label' => '所属分类'],
        ['attribute' => 'user.nickname', 'label' => '作者'],
        ['attribute' => 'status', 'format' => ['array', $model::$statusArray]],
        'created_at:datetime',
    ]
]) ?>
