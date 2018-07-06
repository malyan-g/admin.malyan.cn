<?php

use app\components\widgets\GridView;

/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\search\UserSearch */

$this->title = Yii::t('module', 'User') . Yii::t('common', 'List Title');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('search', ['searchModel' => $searchModel]) ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\CheckboxColumn'],
        'id',
        'username:email',
        'nickname',
        ['attribute' => 'avatar', 'format' => ['image', ['width' => 32, 'height' => 32]]],
        ['attribute' => 'status', 'format' => ['array', $searchModel::$statusArray]],
        'created_at:datetime',
        ['class' => 'app\components\grid\ActionColumn', 'module' => Yii::t('module', 'User'), 'template' => '{view}{update}']
    ]
]) ?>
