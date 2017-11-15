<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpPatch]].
 *
 * @see SgpPatch
 */
class SgpPatchQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpPatch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    // Sameer -Get Patch data for dropdown list
    public function allnotdeleted()
    {
        return SgpPatch::find()->where(["=", "is_deleted",0])->all();
        
    }
    /**
     * @inheritdoc
     * @return SgpPatch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
