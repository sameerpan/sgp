<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_doctor_qualification".
 *
 * @property integer $id
 * @property string $qualification_name
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpDoctorDetails[] $sgpDoctorDetails
 */
class SgpDoctorQualification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_doctor_qualification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update
            [['qualification_name'], 'required'],
            [['is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['qualification_name'], 'string', 'max' => 50],
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
            'id' => Yii::t('app', 'Qualification ID'),
            'qualification_name' => Yii::t('app', 'Qualification Name'),
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
    public function getSgpDoctorDetails()
    {
        return $this->hasMany(SgpDoctorDetails::className(), ['qualification' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SgpDoctorQualificationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpDoctorQualificationQuery(get_called_class());
    }
    // Sameer -Get doctor qualification data for dropdown list
    public static function getAllNotDeleted()
    {
      $doctorqualificationq=new \app\models\SgpDoctorQualificationQuery(new \app\models\SgpDoctorQualification);
      return $doctorqualificationq->allnotdeleted();
      
    }  
}
