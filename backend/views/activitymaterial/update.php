<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ActivityMaterial $model */

$this->title = 'Update Activity Material: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Activity Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
