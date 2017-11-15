<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpRouteRates]].
 *
 * @see SgpRouteRates
 */
class SgpRouteRatesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpRouteRates[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpRouteRates|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
