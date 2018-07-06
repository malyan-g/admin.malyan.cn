<?php

use yii\helpers\Url;
use app\models\Album;
use app\components\helpers\Html;
use app\components\widgets\ActiveForm;

/* @var $model \app\models\User */
$isNewRecord = $model->isNewRecord;
$this->title = Yii::t('common', $isNewRecord ? 'Create Title' : 'Update Title') . Yii::t('module', 'Picture');
?>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username', [
    'inputOptions' => ['disabled' => true]
]) ?>
<?= $form->field($model, 'nickname', [
    'inputOptions' => ['disabled' => true]
]) ?>
<?= $form->field($model, 'avatar', [
    'template' => '{label}<div>'. Html::img($model->avatar, ['border' => 0, 'width' => '100%']) .'</div>'
]); ?>
<?= $form->field($model, 'status')->dropDownList($model::$statusArray, ['prompt' => '请选择']) ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('common', $isNewRecord ? 'Create' : 'Update'), ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>
