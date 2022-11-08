<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProjectMaterial $model */

$this->title = 'Create Project Material';
$this->params['breadcrumbs'][] = ['label' => 'Project Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
