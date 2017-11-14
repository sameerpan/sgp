<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpExpenseType]].
 *
 * @see SgpExpenseType
 */
class SgpExpenseTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpExpenseType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpExpenseType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
