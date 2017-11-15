<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_doctor_details".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $contact_id
 * @property string $date_of_birth
 * @property integer $speciality_id
 * @property integer $class_id
 * @property integer $qualification_id
 * @property integer $patch_id
 * @property string $phone
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property integer $is_deleted
 * @property integer $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpDoctorClass $class
 * @property SgpContactDetails $contact
 * @property SgpDoctorQualification $qualification
 * @property SgpDoctorSpeciality $speciality
 * @property SgpPatch $patch
 */
class SgpDoctorDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_doctor_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update
            [['first_name', 'last_name', 'contact_id', 'date_of_birth', 'speciality_id', 'class_id', 'qualification_id', 'patch_id', 'phone', 'address1', 'address2', 'city'], 'required'],
            [['contact_id', 'speciality_id', 'class_id', 'qualification_id', 'patch_id', 'phone', 'address1', 'address2', 'city', 'is_deleted', 'crt_dt', 'crt_by', 'upd_by'], 'integer'],
            [['date_of_birth', 'upd_dt'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpDoctorClass::className(), 'targetAttribute' => ['class_id' => 'id']],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpContactDetails::className(), 'targetAttribute' => ['contact_id' => 'id']],
            [['qualification_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpDoctorQualification::className(), 'targetAttribute' => ['qualification_id' => 'id']],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpDoctorSpeciality::className(), 'targetAttribute' => ['speciality_id' => 'id']],
            [['patch_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpPatch::className(), 'targetAttribute' => ['patch_id' => 'id']],
            //Sameer -these are added to add default create date,created by,update date and updated by  upon insert or update
            //crt_dt, crt_by is added when the record is inserted for the first time only
            //upd_dt,upd_by is added in both insert as well as update scenarios
            ['crt_dt', 'default', 'value'=> Yii::$app->formatter->asDate('now', 'php:Y-m-d H:i:s A'),  'when'=>function($model) { return $model->isNewRecord; }],
            ['upd_dt', 'default', 'value'=> Yii::$app->formatter->asDate('now', 'php:Y-m-d H:i:s A'),  'when'=>function($model) { return $model->isNewRecord; }],
            ['upd_dt', 'default', 'value'=> Yii::$app->formatter->asDate('now', 'php:Y-m-d H:i:s A'),  'when'=>function($model) { return !$model->isNewRecord; }],
            ['crt_by', 'default', 'value'=>Yii::$app->user->id ,  'when'=>function($model) { return $model->isNewRecord; }],
            ['upd_by', 'default', 'value'=>Yii::$app->user->id,  'when'=>function($model) { return $model->isNewRecord; }],
               
            ['upd_by', 'default', 'value'=>Yii::$app->user->id,  'when'=>function($model) { return !$model->isNewRecord; }],        
            //default value of is_deleted for insert and update.        
            ['is_deleted', 'default', 'value'=>0, ], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Class ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'contact_id' => Yii::t('app', 'Contact ID'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'speciality_id' => Yii::t('app', 'Speciality Name'),
            'class_id' => Yii::t('app', 'Class Name'),
            'qualification_id' => Yii::t('app', 'Qualification'),
            'patch_id' => Yii::t('app', 'Patch Name'),
              'phone' => Yii::t('app', 'Phone'),   
             'address1' => Yii::t('app', 'address1'), 
             'address2' => Yii::t('app', 'address2'), 
             'city' => Yii::t('app', 'city'),            
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'crt_dt' => Yii::t('app', 'Crt Dt'),
            'crt_by' => Yii::t('app', 'Crt By'),
            'upd_dt' => Yii::t('app', 'Upd Dt'),
            'upd_by' => Yii::t('app', 'Upd By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(SgpDoctorClass::className(), ['id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(SgpContactDetails::className(), ['id' => 'contact_id']);
    }
    // Sameer- added method 
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhone()
    {
        return $this->hasOne(SgpContactDetails::className(), ['phone' => 'contact_id']);
    }
    
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress1()
    {
        return $this->hasOne(SgpContactDetails::className(), ['address1' => 'contact_id']);
    }
        /**
     * @return \yii\db\ActiveQuery
     */
       public function getAddress2()
    {
        return $this->hasOne(SgpContactDetails::className(), ['address2' => 'contact_id']);
    }
        /**
     * @return \yii\db\ActiveQuery
     */
     public function getCity()
    {
        return $this->hasOne(SgpContactDetails::className(), ['city' => 'contact_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQualification()
    {
        return $this->hasOne(SgpDoctorQualification::className(), ['id' => 'qualification_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(SgpDoctorSpeciality::className(), ['id' => 'speciality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatch()
    {
        return $this->hasOne(SgpPatch::className(), ['id' => 'patch_id']);
    }

    /**
     * @inheritdoc
     * @return SgpDoctorDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpDoctorDetailsQuery(get_called_class());
    }
}
