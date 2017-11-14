<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpDoctorDetails $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Doctor Details',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doctor Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-doctor-details-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
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
