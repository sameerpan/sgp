<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpHoliday]].
 *
 * @see SgpHoliday
 */
class SgpHolidayQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpHoliday[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpHoliday|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
