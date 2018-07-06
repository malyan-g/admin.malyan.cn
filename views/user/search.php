<?php

use app\components\helpers\Html;
use app\components\widgets\ActiveForm;

/* @var $searchModel \app\models\search\UserSearch */
?>
<?php $form = ActiveForm::begin(['module' => ActiveForm::TYPE_SEARCH]) ?>
<?= $form->field($searchModel, 'username') ?>
<?= $form->field($searchModel, 'nickname') ?>
<?= $form->field($searchModel, 'status')->dropDownList($searchModel::$statusArray, ['prompt' => Yii::t('common', 'All')]) ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('common', 'Search'), ['class' => 'btn btn-info mr-5']) ?>
</div>
<?php ActiveForm::end() ?>
<div class="hr dotted"></div>
