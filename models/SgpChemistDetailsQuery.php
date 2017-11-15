<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpChemistDetails]].
 *
 * @see SgpChemistDetails
 */
class SgpChemistDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpChemistDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpChemistDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
