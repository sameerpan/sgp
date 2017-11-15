<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpUserDetails]].
 *
 * @see SgpUserDetails
 */
class SgpUserDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpUserDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
   // Sameer -Get User data for dropdown list
    public function allnotdeleted()
    {
        return SgpUserDetails::find()->where(["=", "is_deleted",0])->all();
        
    }
    /**
     * @inheritdoc
     * @return SgpUserDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
