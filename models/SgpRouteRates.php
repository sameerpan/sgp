<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_route_rates".
 *
 * @property integer $id
 * @property string $designation_id
 * @property double $rate
 * @property string $from_date
 * @property string $to_date
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 */
class SgpRouteRates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_route_rates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update
            [['rate', 'designation_id', 'from_date', 'to_date'], 'required'],
            [['rate'], 'number'],
            [['from_date', 'to_date', 'crt_dt', 'upd_dt'], 'safe'],
            [['is_deleted', 'designation_id', 'crt_by', 'upd_by'], 'integer'],
            //[['designation'], 'string', 'max' => 50],
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
            'id' => Yii::t('app', 'Route Rate ID'),
            'designation_id' => Yii::t('app', 'Designation Name'),
            'rate' => Yii::t('app', 'Rate'),
            'from_date' => Yii::t('app', 'From Date'),
            'to_date' => Yii::t('app', 'To Date'),
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
    public function getDesignation()
    {
        return $this->hasOne(SgpDesignation::className(), ['id' => 'designation_id']);
    }
    /**
     * @inheritdoc
     * @return SgpRouteRatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpRouteRatesQuery(get_called_class());
    }
}
