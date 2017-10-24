<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpHq]].
 *
 * @see SgpHq
 */
class SgpHqQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpHq[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpHq|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
