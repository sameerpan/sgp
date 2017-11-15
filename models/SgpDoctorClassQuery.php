<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpDoctorClass]].
 *
 * @see SgpDoctorClass
 */
class SgpDoctorClassQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpDoctorClass[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    // Sameer -Get doctor class data for dropdown list
    public function allnotdeleted()
    {
        return SgpDoctorClass::find()->where(["=", "is_deleted",0])->all();
        
    }
    /**
     * @inheritdoc
     * @return SgpDoctorClass|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
