<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpGifts $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Gifts',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gifts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-gifts-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
