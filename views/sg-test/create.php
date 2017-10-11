<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgTest $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Sg Test',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sg Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sg-test-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
