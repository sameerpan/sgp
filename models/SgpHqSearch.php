<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpHq;

/**
 * SgpHqSearch represents the model behind the search form about `app\models\SgpHq`.
 */
class SgpHqSearch extends SgpHq
{
    public function rules()
    {
        return [
            [['id', 'region_id', 'state_id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['hq_name', 'crt_dt', 'upd_dt'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SgpHq::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'region_id' => $this->region_id,
            'state_id' => $this->state_id,
            'is_deleted' => $this->is_deleted,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        $query->andFilterWhere(['like', 'hq_name', $this->hq_name]);

        return $dataProvider;
    }
}
