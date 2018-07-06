<?php

use app\components\helpers\Html;
use app\components\widgets\GridView;

/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\search\ArticleSearch */

$this->title = Yii::t('module', 'Article') . Yii::t('common', 'List Title');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('search', ['searchModel' => $searchModel]) ?>
<p>
    <?= Html::a(Yii::t('button', 'Create Article'), ['article/create'], ['class' => 'btn btn-success mr-5', 'target' => '_blank']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\CheckboxColumn'],
        'id',
        'attach.title:truncate',
        ['attribute' => 'category.name', 'label' => '所属分类'],
        ['attribute' => 'user.nickname', 'label' => '作者'],
        ['attribute' => 'status', 'format' => ['array', $searchModel::$statusArray]],
        'created_at:datetime',
        ['class' => 'app\components\grid\ActionColumn', 'module' => Yii::t('module', 'Article')]
    ]
]) ?>
