<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpFileUpload $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-file-upload-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Expense Name...', 'maxlength' => 100]],

           // 'scope_territory' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Scope Territory...']],
            
            // Sameer - Changed to dropdownlist and  used items   
            'scope_territory' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$items ,'options' => ['Select' => 'Select Territory...']],

            'territory_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Territory ID...']],

            'file_path' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter File Path...', 'maxlength' => 200]],

            'file_url' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter File Url...', 'maxlength' => 200]],

        /*    'is_deleted' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Is Deleted...']],

            'crt_dt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'crt_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Crt By...']],

            'upd_dt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'upd_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Upd By...']],*/

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
