<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_patch".
 *
 * @property integer $id
 * @property integer $hq_id
 * @property string $patch_name
 * @property integer $is_deleted
 * @property integer $is_delete_approved
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpDoctorDetails[] $sgpDoctorDetails
 * @property SgpHq $hq
 * @property SgpRoute[] $sgpRoutes
 * @property SgpRoute[] $sgpRoutes0
 */
class SgpPatch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_patch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update
            [['hq_id', 'patch_name'], 'required'],
            [['hq_id', 'is_deleted', 'is_delete_approved', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['patch_name'], 'string', 'max' => 50],
            [['hq_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpHq::className(), 'targetAttribute' => ['hq_id' => 'id']],
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
            'id' => Yii::t('app', 'Patch ID'),
            'hq_id' => Yii::t('app', 'HQ Name'),
            'patch_name' => Yii::t('app', 'Patch Name'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'is_delete_approved' => Yii::t('app', 'Is Delete Approved'),
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
        return $this->hasMany(SgpDoctorDetails::className(), ['patch' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHq()
    {
        return $this->hasOne(SgpHq::className(), ['id' => 'hq_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpRoutes()
    {
        return $this->hasMany(SgpRoute::className(), ['from_patch' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpRoutes0()
    {
        return $this->hasMany(SgpRoute::className(), ['to_patch' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SgpPatchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpPatchQuery(get_called_class());
    }
     // Sameer -Get Patch data for dropdown list
    public static function getAllNotDeleted()
    {
      $patchq=new \app\models\SgpPatchQuery(new \app\models\SgpPatch);
      return $patchq->allnotdeleted();
      
    }    
}
