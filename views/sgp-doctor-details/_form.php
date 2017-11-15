<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpDoctorDetails $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-doctor-details-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'first_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter First Name...', 'maxlength' => 100]],

            'last_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Last Name...', 'maxlength' => 100]],

           // 'contact_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Contact ID...']],
            
            // Sameer - Changed to dropdownlist and  used items   
            'contact_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items' => $email ,'options' => ['Select' => 'Select Contact Email...']],

            'date_of_birth' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATE,'displayFormat' => 'php:d-M-Y']],

            //'speciality_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Specialty...']],
            
            // Sameer - Changed to dropdownlist and  used items   
            'speciality_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items' => $speciality_name ,'options' => ['Select' => 'Select Doctor Speciality...']],

           // 'class_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Class...']],
            
            // Sameer - Changed to dropdownlist and  used items   
            'class_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items' => $class_name ,'options' => ['Select' => 'Select Doctor Class...']],

            //'qualification_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Qualification...']],
            
            // Sameer - Changed to dropdownlist and  used items   
            'qualification_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items' => $qualification_name ,'options' => ['Select' => 'Select Doctor Qualification...']],

           // 'patch_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Patch...']],
            
            // Sameer - Changed to dropdownlist and  used items   
            'patch_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=> $patch_name ,'options' => ['Select' => 'Select Patch...']],
            //Sameer -We don't need following vaules shown in the insert or update form.
         /*   'is_deleted' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Is Deleted...']],

            'crt_dt' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Crt Dt...']],

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
