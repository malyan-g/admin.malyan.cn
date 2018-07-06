<?php

use app\components\widgets\DetailView;

/* @var $model \app\models\Nav */

$this->title = Yii::t('module', 'Picture') . Yii::t('common', 'View Title');
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'url',
        'sort',
        ['attribute' => 'status', 'format' => ['array', $model::$statusArray]],
        'created_at:datetime',
    ]
]) ?>
