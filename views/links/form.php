<?php

use yii\helpers\Url;
use app\models\Album;
use app\components\helpers\Html;
use app\components\widgets\ActiveForm;

/* @var $model \app\models\Links */
$isNewRecord = $model->isNewRecord;
$this->title = Yii::t('common', $isNewRecord ? 'Create Title' : 'Update Title') . Yii::t('module', 'Links');
?>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'link') ?>
<?= $form->field($model, 'status')->dropDownList($model::$statusArray, ['prompt' => '请选择']) ?>
<?= $form->field($model, 'sort') ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('common', $isNewRecord ? 'Create' : 'Update'), ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>
