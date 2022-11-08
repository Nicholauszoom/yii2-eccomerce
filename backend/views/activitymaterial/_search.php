<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\ActivityMaterialSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="activity-material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'activity_material_id') ?>

    <?= $form->field($model, 'activity_material_name') ?>

    <?= $form->field($model, 'material_budget') ?>

    <?= $form->field($model, 'activity_name') ?>

    <?php // echo $form->field($model, 'acticity_start_date') ?>

    <?php // echo $form->field($model, 'activity_end_date') ?>

    <?php // echo $form->field($model, 'items_quantity') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
