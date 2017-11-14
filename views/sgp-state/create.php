<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpState $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'State',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-state-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
