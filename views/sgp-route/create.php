<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpRoute $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Route',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Routes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-route-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        // Sameer -Added items   
        'items' => $items,
    ]) ?>

</div>
