<?php
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


/** @var yii\web\View $this */
/** @var common\models\Company $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_description')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true,'type'=>'number']) ?>

    <?= $form->field($model, 'created_at')->textInput(['placeholder' => \Yii::t('app', 'mm/dd/yyyy')]) ;?>


    <?= $form->field($model, 'status')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
