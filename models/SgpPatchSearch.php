<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpPatch;

/**
 * SgpPatchSearch represents the model behind the search form about `app\models\SgpPatch`.
 */
class SgpPatchSearch extends SgpPatch
{
    public function rules()
    {
        return [
            //Sameer - Changed hq_id on safe field search field name
            [['id', 'is_deleted', 'is_delete_approved', 'crt_by', 'upd_by'], 'integer'],
            [['patch_name', 'hq_id', 'crt_dt', 'upd_dt'], 'safe'],
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
       // $query = SgpPatch::find();
        $query = SgpPatch::find()->where(["=", "sgp_patch.is_deleted",0]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->joinWith('hq'); 
                
        $query->andFilterWhere([
            'id' => $this->id,
            //'hq_id' => $this->hq_id,
            //Sameer - Always search for non deleted records
           // 'is_deleted' => $this->is_deleted,
            'sgp_patch.is_deleted' => 0,
            'is_delete_approved' => $this->is_delete_approved,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        $query->andFilterWhere(['like', 'patch_name', $this->patch_name])
              ->andFilterWhere(['like', 'sgp_hq.hq_name', $this->hq_id]);

        return $dataProvider;
    }
}
