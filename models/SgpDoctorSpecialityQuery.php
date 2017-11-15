<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpDoctorSpeciality]].
 *
 * @see SgpDoctorSpeciality
 */
class SgpDoctorSpecialityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpDoctorSpeciality[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
  // Sameer -Get Doctor Speciality data for dropdown list
     public function allnotdeleted()
    {
        return SgpDoctorSpeciality::find()->where(["=", "is_deleted",0])->all();
        
    }   
    /**
     * @inheritdoc
     * @return SgpDoctorSpeciality|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
