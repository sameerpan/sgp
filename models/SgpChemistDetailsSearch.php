<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpChemistDetails;

/**
 * SgpChemistDetailsSearch represents the model behind the search form about `app\models\SgpChemistDetails`.
 */
class SgpChemistDetailsSearch extends SgpChemistDetails
{
    public function rules()
    {
        return [
            //Sameer - Changed contact_id and hq_id  on safe field search field name
            [['id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['name', 'contact_id', 'hq_id', 'gst', 'crt_dt', 'upd_dt'], 'safe'],
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
       //$query = SgpChemistDetails::find();
        $query = SgpChemistDetails::find()->where(["=", "sgp_chemist_details.is_deleted",0]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
         //Sameer -Added join query contact and hq
        $query->joinWith('contact');
        $query->joinWith('hq');
        $query->andFilterWhere([
            'id' => $this->id,
            //'contact_id' => $this->contact_id,
            // 'hq_id' => $this->hq_id,
            'is_deleted' => $this->is_deleted,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'gst', $this->gst])
              //Sameer - Search related table record email and hq_name
              ->andFilterWhere(['like', 'sgp_contact_details.email', $this->contact_id])
              ->andFilterWhere(['like', 'sgp_hq.hq_name', $this->hq_id]);
        return $dataProvider;
    }
}
