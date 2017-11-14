<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpRouteRates $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Route Rates',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Route Rates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-route-rates-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        // Sameer -Added items   
        'designation_name' => $designation_name 
    ]) ?>

</div>
