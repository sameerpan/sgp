<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpTarget $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Target',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Targets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-target-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        // Sameer -Added items   
        'items' => $items,
    ]) ?>

</div>
