<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SgpFileUpload $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'File Upload',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'File Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-file-upload-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        // Sameer -Added items   
        'items' => $items,
    ]) ?>

</div>
