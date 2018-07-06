<?php

use app\components\widgets\DetailView;

/* @var $model \app\models\Banner */

$this->title = Yii::t('module', 'Banner') . Yii::t('common', 'View Title');
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        ['attribute' => 'url', 'format' => ['image', ['width' => '100%']]],
        'title',
        'describe',
        'sort',
        ['attribute' => 'status', 'format' => ['array', $model::$statusArray]],
        'created_at:datetime'
    ]
]) ?>
