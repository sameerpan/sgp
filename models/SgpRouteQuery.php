<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpRoute]].
 *
 * @see SgpRoute
 */
class SgpRouteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpRoute[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpRoute|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
