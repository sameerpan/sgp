<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpChemistDetails $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Chemist Details',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chemist Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-chemist-details-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    // Sameer -Added items
     'email' => $email,
     'hq_name' => $hq_name,
     'contact_details' => $contact_details,
    ]) ?>

</div>
