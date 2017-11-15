<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpExpenseType $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Expense Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expense Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-expense-type-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
