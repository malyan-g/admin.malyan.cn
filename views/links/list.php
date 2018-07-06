<?php

use app\components\helpers\Html;
use app\components\widgets\GridView;

/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\search\LinksSearch */

$this->title = Yii::t('module', 'Links') . Yii::t('common', 'List Title');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('search', ['searchModel' => $searchModel]) ?>
<p>
    <?= Html::a(Yii::t('button', 'Create Links'), ['links/create'], ['class' => 'btn btn-success mr-5', 'target' => '_blank']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\CheckboxColumn'],
        'id',
        'title:truncate',
        'link:url',
        ['attribute' => 'status', 'format' => ['array', $searchModel::$statusArray]],
        'sort',
        'created_at:datetime',
        ['class' => 'app\components\grid\ActionColumn', 'module' => Yii::t('module', 'Links')]
    ]
]) ?>
