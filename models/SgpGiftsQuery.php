<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpGifts]].
 *
 * @see SgpGifts
 */
class SgpGiftsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpGifts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpGifts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
