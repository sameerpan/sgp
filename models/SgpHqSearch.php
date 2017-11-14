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
             //Sameer - Changed region_id and state_id  on safe field search field name
            [['id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['hq_name', 'region_id', 'state_id', 'crt_dt', 'upd_dt'], 'safe'],

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
      //$query = SgpHq::find();
         $query = SgpHq::find()->where(["=", "sgp_hq.is_deleted",0]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        
        $query->joinWith('region');
        $query->joinWith('state');     
        
        $query->andFilterWhere([
            'id' => $this->id,
           
            //Sameer - comment region_id and state_id           
           // 'region_id' => $this->region_id,
           // 'state_id' => $this->state_id,
           
            //Sameer - Always search for non deleted records
           // 'is_deleted' => $this->is_deleted,
            'sgp_hq.is_deleted' => 0,

            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        
        $query->andFilterWhere(['like', 'hq_name', $this->hq_name])
                //Sameer - Search related table record region name  and state name
               ->andFilterWhere(['like', 'sgp_region.region_name', $this->region_id])
               ->andFilterWhere(['like', 'sgp_state.state_name', $this->state_id]);
        

        return $dataProvider;
    }
}
