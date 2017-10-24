<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpHq $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Sgp Hq',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sgp Hqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-hq-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        // Sameer -Added items   
        'items' => $items
    ]) ?>

</div>
