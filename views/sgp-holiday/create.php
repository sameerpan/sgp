<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpHoliday $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Holiday',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Holidays'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-holiday-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
