<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpDoctorDetails $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Doctor Details',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doctor Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sgp-doctor-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // Sameer -Added items  
        'email' => $email,
        'speciality_name' => $speciality_name,
        'class_name' => $class_name,
        'qualification_name' => $qualification_name,
        'patch_name' => $patch_name,
        'contact_details' => $contact_details,         
    ]) ?>

</div>
