<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_file_upload".
 *
 * @property integer $id
 * @property string $name
 * @property integer $scope_territory
 * @property integer $territory_id
 * @property string $file_path
 * @property string $file_url
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpTerritoryType $scopeTerritory
 */
class SgpFileUpload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_file_upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update
            [['name', 'scope_territory', 'territory_id', 'file_path', 'file_url'], 'required'],
            [['scope_territory', 'territory_id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['file_path', 'file_url'], 'string', 'max' => 200],
            [['scope_territory'], 'exist', 'skipOnError' => true, 'targetClass' => SgpTerritoryType::className(), 'targetAttribute' => ['scope_territory' => 'id']],
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
            'id' => Yii::t('app', 'File ID'),
            'name' => Yii::t('app', 'Expense Name'),
            'scope_territory' => Yii::t('app', 'Scope Territory'),
            'territory_id' => Yii::t('app', 'Territory ID'),
            'file_path' => Yii::t('app', 'File Path'),
            'file_url' => Yii::t('app', 'File Url'),
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
    public function getScopeTerritory()
    {
        return $this->hasOne(SgpTerritoryType::className(), ['id' => 'scope_territory']);
    }

    /**
     * @inheritdoc
     * @return SgpFileUploadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpFileUploadQuery(get_called_class());
    }
}
