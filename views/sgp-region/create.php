<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpRegion $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Sgp Region',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sgp Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-region-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
