<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpTerritoryType]].
 *
 * @see SgpTerritoryType
 */
class SgpTerritoryTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpTerritoryType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    // Sameer -Get Territory Type data for dropdown list
    public function allnotdeleted()
    {
        return SgpTerritoryType::find()->where(["=", "is_deleted",0])->all();
        
    }
    /**
     * @inheritdoc
     * @return SgpTerritoryType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
