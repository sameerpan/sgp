<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_state".
 *
 * @property integer $id
 * @property string $state_name
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpHq[] $sgpHqs
 */
class SgpState extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while updat           
            [['state_name'], 'required'],
            [['is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['state_name'], 'string', 'max' => 50],
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
            'id' => Yii::t('app', 'State ID'),
            'state_name' => Yii::t('app', 'State Name'),
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
    public function getSgpHqs()
    {
        return $this->hasMany(SgpHq::className(), ['state_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SgpStateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpStateQuery(get_called_class());
    }
    // Sameer -Get State data for dropdown list
    public static function getAllNotDeleted()
    {
      $stateq=new \app\models\SgpStateQuery(new \app\models\SgpState);
      return $stateq->allnotdeleted();
      
    } 
}
