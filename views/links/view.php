<?php

use app\components\widgets\DetailView;

/* @var $model \app\models\Links */

$this->title = Yii::t('module', 'Links') . Yii::t('common', 'View Title');
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'title',
        'link:url',
        ['attribute' => 'status', 'format' => ['array', $model::$statusArray]],
        'sort',
        'created_at:datetime',
    ]
]) ?>
