<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgTest;

/**
 * SgTestSearch represents the model behind the search form about `app\models\SgTest`.
 */
class SgTestSearch extends SgTest
{
    public function rules()
    {
        return [
            [['id', 'Name'], 'string'],
            [['date', 'mod_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SgTest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'Name' => $this->Name,
            'date' => $this->date,
            'mod_date' => $this->mod_date,
        ]);

        return $dataProvider;
    }
}
