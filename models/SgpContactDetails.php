<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_contact_details".
 *
 * @property integer $id
 * @property string $email
 * @property string $phone
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpChemistDetails[] $sgpChemistDetails
 * @property SgpDoctorDetails[] $sgpDoctorDetails
 * @property SgpStockiestDetails[] $sgpStockiestDetails
 * @property SgpUserDetails[] $sgpUserDetails
 */
class SgpContactDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_contact_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'address1', 'address2', 'city', 'is_deleted', 'crt_dt', 'crt_by', 'upd_dt', 'upd_by'], 'required'],
            [['is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['email', 'address1', 'address2'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 50],
            [['city'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Contact ID'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'address1' => Yii::t('app', 'Address1'),
            'address2' => Yii::t('app', 'Address1'),
            'city' => Yii::t('app', 'City '),
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
        return $this->hasMany(SgpChemistDetails::className(), ['contact_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpDoctorDetails()
    {
        return $this->hasMany(SgpDoctorDetails::className(), ['contact_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpStockiestDetails()
    {
        return $this->hasMany(SgpStockiestDetails::className(), ['contact_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgpUserDetails()
    {
        return $this->hasMany(SgpUserDetails::className(), ['contact_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SgpContactDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpContactDetailsQuery(get_called_class());
    }
    // Sameer -Get contact details data for dropdown list
    public static function getAllNotDeleted()
    {
      $contactdetailsq=new \app\models\SgpContactDetailsQuery(new \app\models\SgpContactDetails);
      return $contactdetailsq->allnotdeleted();
      
    }  
}
