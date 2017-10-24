<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sgp_hq}}".
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
 *
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
        return '{{%sgp_hq}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id', 'state_id', 'hq_name', 'is_deleted', 'crt_dt', 'crt_by', 'upd_dt', 'upd_by'], 'required'],
            [['region_id', 'state_id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['hq_name'], 'string', 'max' => 50],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpRegion::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpState::className(), 'targetAttribute' => ['state_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'HQ ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'state_id' => Yii::t('app', 'State ID'),
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
}
