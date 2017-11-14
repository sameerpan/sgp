<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpStockiestDetails $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Stockiest Details',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stockiest Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sgp-stockiest-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // Sameer -Added items   
        'email' => $email,
        'hq_name' => $hq_name,
        'contact_details' => $contact_details,
    ]) ?>

</div>
