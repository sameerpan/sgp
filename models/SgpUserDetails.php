<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_user_details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $designation
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_joining
 * @property string $date_of_birth
 * @property integer $user_territory_type
 * @property integer $territory_id
 * @property string $qualification
 * @property double $os_allowance
 * @property double $ex_allowance
 * @property integer $contact_id
 * @property integer $is_active
 * @property integer $is_deleted
 * @property string $crt_dt
 * @property integer $crt_by
 * @property string $upd_dt
 * @property integer $upd_by
 *
 * @property SgpContactDetails $contact
 * @property SgpDesignation $designation0
 * @property SgpTerritoryType $userTerritoryType
 * @property User $user
 */
class SgpUserDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_user_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'designation', 'first_name', 'last_name', 'date_of_joining', 'date_of_birth', 'user_territory_type', 'territory_id', 'qualification', 'os_allowance', 'ex_allowance', 'contact_id', 'is_active', 'is_deleted', 'crt_dt', 'crt_by', 'upd_dt', 'upd_by'], 'required'],
            [['user_id', 'designation', 'user_territory_type', 'territory_id', 'contact_id', 'is_active', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['date_of_joining', 'date_of_birth', 'crt_dt', 'upd_dt'], 'safe'],
            [['os_allowance', 'ex_allowance'], 'number'],
            [['first_name', 'last_name', 'qualification'], 'string', 'max' => 100],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpContactDetails::className(), 'targetAttribute' => ['contact_id' => 'id']],
            [['designation'], 'exist', 'skipOnError' => true, 'targetClass' => SgpDesignation::className(), 'targetAttribute' => ['designation' => 'id']],
            [['user_territory_type'], 'exist', 'skipOnError' => true, 'targetClass' => SgpTerritoryType::className(), 'targetAttribute' => ['user_territory_type' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'MRDetails ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'designation' => Yii::t('app', 'Role '),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'date_of_joining' => Yii::t('app', 'Date Of Joining'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'user_territory_type' => Yii::t('app', 'Territory Type'),
            'territory_id' => Yii::t('app', 'Territory ID'),
            'qualification' => Yii::t('app', 'Qualification'),
            'os_allowance' => Yii::t('app', 'Os Allowance'),
            'ex_allowance' => Yii::t('app', 'Ex Allowance'),
            'contact_id' => Yii::t('app', 'Contact ID'),
            'is_active' => Yii::t('app', 'Is Active'),
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
    public function getContact()
    {
        return $this->hasOne(SgpContactDetails::className(), ['id' => 'contact_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignation0()
    {
        return $this->hasOne(SgpDesignation::className(), ['id' => 'designation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTerritoryType()
    {
        return $this->hasOne(SgpTerritoryType::className(), ['id' => 'user_territory_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return SgpUserDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpUserDetailsQuery(get_called_class());
    }
   // Sameer -Get user data for dropdown list
    public static function getAllNotDeleted()
    {
      $userdetailsq=new \app\models\SgpUserDetailsQuery(new \app\models\SgpUserDetails);
      return $userdetailsq->allnotdeleted();
      
    } 
}
