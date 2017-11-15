<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpContactDetails]].
 *
 * @see SgpContactDetails
 */
class SgpContactDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpContactDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    // Sameer -Get contact details data for dropdown list
    public function allnotdeleted()
    {
        return SgpContactDetails::find()->where(["=", "is_deleted",0])->all();
        
    }
    /**
     * @inheritdoc
     * @return SgpContactDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
