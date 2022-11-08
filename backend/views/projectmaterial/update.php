<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProjectMaterial $model */

$this->title = 'Update Project Material: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
