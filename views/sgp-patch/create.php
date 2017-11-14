<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpPatch $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Patch',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-patch-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        // Sameer -Added items  
        'hq_name' => $hq_name
    ]) ?>

</div>
