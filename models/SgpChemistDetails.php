<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgp_chemist_details".
 *
 * @property integer $id
 * @property string $name
 * @property integer $contact_id
 * @property integer $hq_id
 * @property string $gst
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
 * @property SgpContactDetails $contact
 * @property SgpHq $hq
 */
class SgpChemistDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgp_chemist_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Sameer -removed  'is_deleted', 'upd_dt', 'upd_by','crt_dt', 'crt_by' as these are not mandetory while update
            [['name', 'contact_id', 'hq_id', 'gst'], 'required'],
            [['contact_id', 'hq_id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['crt_dt', 'upd_dt'], 'safe'],
            [['name', 'gst'], 'string', 'max' => 100],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpContactDetails::className(), 'targetAttribute' => ['contact_id' => 'id']],
            [['hq_id'], 'exist', 'skipOnError' => true, 'targetClass' => SgpHq::className(), 'targetAttribute' => ['hq_id' => 'id']],
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
            'id' => Yii::t('app', 'Class ID'),
            'name' => Yii::t('app', 'Chemist Name'),
            'contact_id' => Yii::t('app', 'Contact ID'),
//              'phone' => Yii::t('app', 'Phone'),   
//             'address1' => Yii::t('app', 'address1'), 
//             'address2' => Yii::t('app', 'address2'), 
//             'city' => Yii::t('app', 'city'),            
            'hq_id' => Yii::t('app', 'Hq Name'),
            'gst' => Yii::t('app', 'GST number'),
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
    
    // Sameer- added method 
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhone()
    {
        return $this->hasOne(SgpContactDetails::className(), ['phone' => 'contact_id']);
    }
    
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress1()
    {
        return $this->hasOne(SgpContactDetails::className(), ['address1' => 'contact_id']);
    }
        /**
     * @return \yii\db\ActiveQuery
     */
       public function getAddress2()
    {
        return $this->hasOne(SgpContactDetails::className(), ['address2' => 'contact_id']);
    }
        /**
     * @return \yii\db\ActiveQuery
     */
     public function getCity()
    {
        return $this->hasOne(SgpContactDetails::className(), ['city' => 'contact_id']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHq()
    {
        return $this->hasOne(SgpHq::className(), ['id' => 'hq_id']);
    }

    /**
     * @inheritdoc
     * @return SgpChemistDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SgpChemistDetailsQuery(get_called_class());
    }
}
