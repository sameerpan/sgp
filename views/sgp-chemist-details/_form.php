<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpChemistDetails $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-chemist-details-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Stockiest Name...', 'maxlength' => 100]],

            //'contact_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Contact ID...']],
                        
             // Sameer - Changed to dropdownlist and  used items   
            'contact_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$email ,'options' => ['Select' => 'Select Contact...']],

           // 'hq_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Hq...']],
           
            // Sameer - Changed to dropdownlist and  used items   
            'hq_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$hq_name ,'options' => ['Select' => 'Select HQ...']],

            'gst' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter GST number...', 'maxlength' => 100]],
            //Sameer -We don't need following vaules shown in the insert or update form.
         /*   'is_deleted' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Is Deleted...']],

            'crt_dt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'crt_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Crt By...']],

            'upd_dt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'upd_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Upd By...']],*/

        ]

    ]);
    
            //Sameer - Added create  items  
         echo $form->field($contact_details, 'email');
         echo $form->field($contact_details, 'phone');
         echo $form->field($contact_details, 'address1');
         echo $form->field($contact_details, 'address2');
         echo $form->field($contact_details, 'city');

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
