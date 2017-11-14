<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpDoctorQualification]].
 *
 * @see SgpDoctorQualification
 */
class SgpDoctorQualificationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpDoctorQualification[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    // Sameer -Get doctor qualification data for dropdown list
    public function allnotdeleted()
    {
        return SgpDoctorQualification::find()->where(["=", "is_deleted",0])->all();
        
    }
    /**
     * @inheritdoc
     * @return SgpDoctorQualification|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
