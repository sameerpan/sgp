<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SgpFileUpload]].
 *
 * @see SgpFileUpload
 */
class SgpFileUploadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SgpFileUpload[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SgpFileUpload|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
