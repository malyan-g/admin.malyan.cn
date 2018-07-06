<?php

use app\components\helpers\Html;
use app\components\widgets\ActiveForm;

/* @var $searchModel \app\models\search\PictureSearch */
?>
<?php $form = ActiveForm::begin(['module' => ActiveForm::TYPE_SEARCH]) ?>
<?= $form->field($searchModel, 'describe') ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('common', 'Search'), ['class' => 'btn btn-info mr-5']) ?>
</div>
<?php ActiveForm::end() ?>
<div class="hr dotted"></div>
