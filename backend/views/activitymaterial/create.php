<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ActivityMaterial $model */

$this->title = 'Create Activity Material';
$this->params['breadcrumbs'][] = ['label' => 'Activity Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
