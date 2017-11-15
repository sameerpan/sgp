<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpDesignation]].
 *
 * @see SgpDesignation
 */
class SgpDesignationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpDesignation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    // Sameer -Get designation data for dropdown list
    public function allnotdeleted()
    {
        return SgpDesignation::find()->where(["=", "is_deleted",0])->all();
        
    }
    /**
     * @inheritdoc
     * @return SgpDesignation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
