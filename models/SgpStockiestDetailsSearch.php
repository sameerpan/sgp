<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpStockiestDetails;

/**
 * SgpStockiestDetailsSearch represents the model behind the search form about `app\models\SgpStockiestDetails`.
 */
class SgpStockiestDetailsSearch extends SgpStockiestDetails
{
    public function rules()
    {
        return [
             //Sameer - Changed contact_id and hq_id  on safe field search field name           
            [['id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['name', 'gst', 'contact_id', 'hq_id', 'crt_dt', 'upd_dt'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SgpStockiestDetails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->joinWith('contact');
        $query->joinWith('hq');
        $query->andFilterWhere([
            'id' => $this->id,
            //'contact_id' => $this->contact_id,
            //'hq_id' => $this->hq_id,
            'is_deleted' => $this->is_deleted,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
               ->andFilterWhere(['like', 'gst', $this->gst])
               ->andFilterWhere(['like', 'sgp_contact_details.email', $this->contact_id])
               ->andFilterWhere(['like', 'sgp_hq.hq_name', $this->hq_id]);
        return $dataProvider;
    }
}
