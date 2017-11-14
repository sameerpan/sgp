<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpHq $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [

    'modelClass' => 'Hq',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hqs'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sgp-hq-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

         // Sameer -Added region name and state name  
        'region_name' => $region_name,
        'state_names' => $state_names,
        

    ]) ?>

</div>
