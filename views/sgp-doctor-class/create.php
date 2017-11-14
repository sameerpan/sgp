<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpDoctorClass $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Doctor Class',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doctor Classes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-doctor-class-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
