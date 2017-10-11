<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sg_test".
 *
 * @property integer $id
 * @property integer $Name
 * @property string $date
 * @property string $mod_date
 */
class SgTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sg_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'date', 'mod_date'], 'required'],
            [['Name'], 'string'],
            [['date', 'mod_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Name' => Yii::t('app', 'Test'),
            'date' => Yii::t('app', 'Create Date'),
            'mod_date' => Yii::t('app', 'Date of Modified '),
        ];
    }
}
