<?php

use app\components\widgets\DetailView;

/* @var \app\models\User $model */

$this->title = Yii::t('module', 'User') . Yii::t('common', 'View Title');
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username:email',
        'nickname',
        ['attribute' => 'avatar', 'format' => ['image', ['width' => '100%']]],
        ['attribute' => 'status', 'format' => ['array', $model::$statusArray]],
        'created_at:datetime'
    ]
]) ?>
