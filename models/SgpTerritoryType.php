<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_territory_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpFileUpload[] $sgpFileUploads
 * @property SgpTarget[] $sgpTargets
 * @property SgpUserDetails[] $sgpUserDetails
 */
class SgpTerritoryType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_territory_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'is_deleted', 'crt_dt', 'crt_by', 'upd_dt', 'upd_by'], 'required'],
            [['is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Territory Type ID'),
            'name' => Yii::t('app', 'Name'),
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
    public function getSgpFileUploads()
    {
        return $this->hasMany(SgpFileUpload::className(), ['scope_territory' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpTargets()
    {
        return $this->hasMany(SgpTarget::className(), ['territory_type' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpUserDetails()
    {
        return $this->hasMany(SgpUserDetails::className(), ['user_territory_type' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SgpTerritoryTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpTerritoryTypeQuery(get_called_class());
    }
        // Sameer -Get Territory Type data for dropdown list
    public static function getAllNotDeleted()
    {
      $territorytypeq=new \app\models\SgpTerritoryTypeQuery(new \app\models\SgpTerritoryType);
      return $territorytypeq->allnotdeleted();
      
    } 
}
