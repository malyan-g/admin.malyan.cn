<?php

use yii\helpers\Url;
use app\components\helpers\Html;
use app\components\widgets\ActiveForm;

/* @var \app\models\Banner $model  */
$isNewRecord = $model->isNewRecord;
$this->title = Yii::t('common', $isNewRecord ? 'Create Title' : 'Update Title') . Yii::t('module', 'Banner');
$this->registerJsFile('js/upload.js', ['depends' => 'app\assets\AppAsset']);
?>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'url', [
    'template' => '{label}<div id="preview">'. Html::img($isNewRecord ? '/images/upload.png' : $model->url, ['id' => 'imageBox', 'border' => 0, 'width' => $isNewRecord ? 90 : '100%', 'onclick' => "$('#previewImg').click();"]) .'</div>{input}{hint}{error}'
])->fileInput(['style' => 'display:none', 'id' => 'previewImg', 'onchange' => 'previewImage(this)']) ?>
<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'describe')->textarea(['rows' => 5]) ?>
<?= $form->field($model, 'status')->dropDownList($model::$statusArray, ['prompt' => '请选择']) ?>
<?= $form->field($model, 'sort') ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('common', $isNewRecord ? 'Create' : 'Update'), ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>
