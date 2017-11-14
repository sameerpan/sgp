<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpState]].
 *
 * @see SgpState
 */
class SgpStateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpState[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
   // Sameer -Get State data for dropdown list
    public function allnotdeleted()
    {
        return SgpState::find()->where(["=", "is_deleted",0])->all();
        
    }
    /**
     * @inheritdoc
     * @return SgpState|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
