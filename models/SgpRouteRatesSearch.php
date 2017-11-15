<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpRouteRates;

/**
 * SgpRouteRatesSearch represents the model behind the search form about `app\models\SgpRouteRates`.
 */
class SgpRouteRatesSearch extends SgpRouteRates
{
    public function rules()
    {
        return [
            [['id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['designation_id', 'from_date', 'to_date', 'crt_dt', 'upd_dt'], 'safe'],
            [['rate'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {

        //Sameer - Changed to search only records with is_deleted=0
       // $query = SgpRouteRates::find();
        $query = SgpRouteRates::find()->where(["=", "sgp_route_rates.is_deleted",0]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->joinWith('designation');
        $query->andFilterWhere([
            'id' => $this->id,
            //'designation_id' => $this->designation_id,
            'rate' => $this->rate,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            //Sameer - Always search for non deleted records
           // 'is_deleted' => $this->is_deleted,
            'sgp_route_rates.is_deleted' => 0,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);
        var_dump($params);
        //$query->andFilterWhere(['like', 'designation', $this->designation]);
        $query->andFilterWhere(['like', 'sgp_designation.designation_name', $this->designation_id]);

        return $dataProvider;
    }
}
