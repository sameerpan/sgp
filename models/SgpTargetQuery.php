<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpTarget]].
 *
 * @see SgpTarget
 */
class SgpTargetQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpTarget[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpTarget|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
