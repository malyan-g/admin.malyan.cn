<?php

use app\components\helpers\Html;
use app\components\widgets\GridView;

/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\search\BannerSearch */

$this->title = Yii::t('module', 'Banner') . Yii::t('common', 'List Title');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('search', ['searchModel' => $searchModel]) ?>
<p>
    <?= Html::a(Yii::t('button', 'Create Banner'), ['banner/create'], ['class' => 'btn btn-success mr-5', 'target' => '_blank']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\CheckboxColumn'],
        'id',
        ['attribute' => 'url', 'format' => ['image', ['width' => 32, 'height' => 32]]],
        'title:truncate',
        'describe:truncate',
        'sort',
        ['attribute' => 'status', 'format' => ['array', $searchModel::$statusArray]],
        ['class' => 'app\components\grid\ActionColumn', 'module' => Yii::t('module', 'Banner')]
    ]
]) ?>
