<?php

use yii\helpers\Url;
use app\components\helpers\Html;
use app\components\widgets\ActiveForm;

/* @var \app\models\Nav $model */
$isNewRecord = $model->isNewRecord;
$this->title = Yii::t('common', $isNewRecord ? 'Create Title' : 'Update Title') . Yii::t('module', 'Nav');
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'url') ?>
<?= $form->field($model, 'pid') ?>
<?= $form->field($model, 'status')->dropDownList($model::$statusArray, ['prompt' => '请选择']) ?>
<?= $form->field($model, 'sort') ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('common', $isNewRecord ? 'Create' : 'Update'), ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
