<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpDoctorSpeciality $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Doctor Speciality',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doctor Specialities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-doctor-speciality-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
