<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ActivityMaterial $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="activity-material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'activity_material_id')->textInput() ?>

    <?= $form->field($model, 'activity_material_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_budget')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activity_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acticity_start_date')->textInput() ?>

    <?= $form->field($model, 'activity_end_date')->textInput() ?>

    <?= $form->field($model, 'items_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
