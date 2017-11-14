<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_target".
 *
 * @property integer $id
 * @property integer $territory_type
 * @property integer $territory_id
 * @property double $target
 * @property string $financial_year
 * @property integer $is_deleted
 * @property integer $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpTerritoryType $territoryType
 */
class SgpTarget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_target';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update            
            [['territory_type', 'territory_id', 'target', 'financial_year'], 'required'],
            [['territory_type', 'territory_id', 'is_deleted', 'crt_dt', 'crt_by', 'upd_by'], 'integer'],
            [['target'], 'number'],
            [['upd_dt'], 'safe'],
            [['financial_year'], 'string', 'max' => 10],
            [['territory_type'], 'exist', 'skipOnError' => true, 'targetClass' => SgpTerritoryType::className(), 'targetAttribute' => ['territory_type' => 'id']],
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
            'id' => Yii::t('app', 'Target ID'),
            'territory_type' => Yii::t('app', 'Terrirtory Type (HQ/Region)'),
            'territory_id' => Yii::t('app', 'Territory Name'),
            'target' => Yii::t('app', 'Target'),
            'financial_year' => Yii::t('app', 'Financial Year'),
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
    public function getTerritoryType()
    {
        return $this->hasOne(SgpTerritoryType::className(), ['id' => 'territory_type']);
    }

    /**
     * @inheritdoc
     * @return SgpTargetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpTargetQuery(get_called_class());
    }
}
