<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpDoctorQualification $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Doctor Qualification',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doctor Qualifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-doctor-qualification-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
