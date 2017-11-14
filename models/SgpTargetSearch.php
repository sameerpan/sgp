<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpTarget;

/**
 * SgpTargetSearch represents the model behind the search form about `app\models\SgpTarget`.
 */
class SgpTargetSearch extends SgpTarget
{
    public function rules()
    {
        return [
            //Sameer - Changed territory_id on safe field 
            [['id', 'territory_type', 'is_deleted', 'crt_dt', 'crt_by', 'upd_by'], 'integer'],
            [['target'], 'number'],
            [['financial_year', 'territory_id', 'upd_dt'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SgpTarget::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->joinWith('territoryType');
        $query->andFilterWhere([
            'id' => $this->id,
            'territory_type' => $this->territory_type,
           // 'territory_id' => $this->territory_id,
            'target' => $this->target,
            'is_deleted' => $this->is_deleted,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        $query->andFilterWhere(['like', 'financial_year', $this->financial_year])
               //Sameer - Search related table record region name  and state name
               ->andFilterWhere(['like', 'sgp_territory_type.name', $this->territory_id,]);

        return $dataProvider;
    }
}
