<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpRegion]].
 *
 * @see SgpRegion
 */
class SgpRegionQuery extends \yii\db\ActiveQuery
{
   /* public function active()
    {
        return $this->andWhere('[[is_deleted]]=0');
    }*/

    /**
     * @inheritdoc
     * @return SgpRegion[]|array
     */
    public function all($db = null)
    {
       return parent::all($db);
       //return parent::andWhere(array('is_deleted'=>0));
    }
    // Sameer -Get Region data for dropdown list
    public function allnotdeleted()
    {
        return SgpRegion::find()->where(["=", "is_deleted",0])->all();
        
    }

    /**
     * @inheritdoc
     * @return SgpRegion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
