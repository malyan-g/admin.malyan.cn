<?php

use yii\helpers\Url;
use app\models\ArticleCategory;
use app\components\helpers\Html;
use app\components\widgets\ActiveForm;

/* @var $article \app\models\Article */
/* @var $articleAttach \app\models\ArticleAttach */
$isNewRecord = $article->isNewRecord;
$this->title = Yii::t('common', $isNewRecord ? 'Create Title' : 'Update Title') . Yii::t('module', 'Picture');
?>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($article, 'category_id')->dropDownList(ArticleCategory::categoryArray(), ['prompt' => '请选择']) ?>
<?= $form->field($articleAttach, 'title') ?>
<?= $form->field($articleAttach, 'content')->widget('yidashi\markdown\Markdown', ['useUploadImage' => true]) ?>
<?= $form->field($article, 'status')->dropDownList($article::$statusArray, ['prompt' => '请选择']) ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('common', $isNewRecord ? 'Create' : 'Update'), ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>
