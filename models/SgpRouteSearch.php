<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpRoute;

/**
 * SgpRouteSearch represents the model behind the search form about `app\models\SgpRoute`.
 */
class SgpRouteSearch extends SgpRoute
{
    public function rules()
    {
        return [
            [['id', 'from_patch', 'to_patch', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['route_name', 'crt_dt', 'upd_dt'], 'safe'],
            [['distance'], 'number'],
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
       // $query = SgpRegion::find();
        $query = SgpRoute::find()->where(["=", "is_deleted",0]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from_patch' => $this->from_patch,
            'to_patch' => $this->to_patch,
            'distance' => $this->distance,
            //Sameer - Always search for non deleted records
           // 'is_deleted' => $this->is_deleted,
            'is_deleted' => 0,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        $query->andFilterWhere(['like', 'route_name', $this->route_name]);

        return $dataProvider;
    }
}
