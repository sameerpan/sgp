<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_hq".
 *
 * @property integer $id
 * @property integer $region_id
 * @property integer $state_id
 * @property string $hq_name
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by

 * @property SgpChemistDetails[] $sgpChemistDetails
 * @property SgpRegion $region
 * @property SgpState $state
 * @property SgpPatch[] $sgpPatches
 * @property SgpStockiestDetails[] $sgpStockiestDetails
 */
class SgpHq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_hq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update
            [['region_id', 'state_id', 'hq_name'], 'required'],
            [['region_id', 'state_id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['hq_name'], 'string', 'max' => 50],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpRegion::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpState::className(), 'targetAttribute' => ['state_id' => 'id']],
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
            'id' => Yii::t('app', 'HQ ID'),
            'region_id' => Yii::t('app', 'Region Name'),
            'state_id' => Yii::t('app', 'State Name'),
            'hq_name' => Yii::t('app', 'HQ Name'),
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
    public function getSgpChemistDetails()
    {
        return $this->hasMany(SgpChemistDetails::className(), ['hq' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(SgpRegion::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(SgpState::className(), ['id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpPatches()
    {
        return $this->hasMany(SgpPatch::className(), ['hq_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpStockiestDetails()
    {
        return $this->hasMany(SgpStockiestDetails::className(), ['hq' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SgpHqQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpHqQuery(get_called_class());
    }
    // Sameer -Get HQ data for dropdown list
    public static function getAllNotDeleted()
    {
      $hqq=new \app\models\SgpHqQuery(new \app\models\SgpHq);
      return $hqq->allnotdeleted();
      
    }     
}
