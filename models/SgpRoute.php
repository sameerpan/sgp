<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_route".
 *
 * @property integer $id
 * @property string $route_name
 * @property integer $from_patch
 * @property integer $to_patch
 * @property double $distance
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpPatch $fromPatch
 * @property SgpPatch $toPatch
 */
class SgpRoute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_route';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update
            [['route_name', 'from_patch', 'to_patch', 'distance'], 'required'],
            [['from_patch', 'to_patch', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['distance'], 'number'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['route_name'], 'string', 'max' => 100],
            [['from_patch'], 'exist', 'skipOnError' => true, 'targetClass' => SgpPatch::className(), 'targetAttribute' => ['from_patch' => 'id']],
            [['to_patch'], 'exist', 'skipOnError' => true, 'targetClass' => SgpPatch::className(), 'targetAttribute' => ['to_patch' => 'id']],
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
            'id' => Yii::t('app', 'Route ID'),
            'route_name' => Yii::t('app', 'Route name'),
            'from_patch' => Yii::t('app', 'From Patch'),
            'to_patch' => Yii::t('app', 'To Patch'),
            'distance' => Yii::t('app', 'Distance'),
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
    public function getFromPatch()
    {
        return $this->hasOne(SgpPatch::className(), ['id' => 'from_patch']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToPatch()
    {
        return $this->hasOne(SgpPatch::className(), ['id' => 'to_patch']);
    }

    /**
     * @inheritdoc
     * @return SgpRouteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpRouteQuery(get_called_class());
    }
}
