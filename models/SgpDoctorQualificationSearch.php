<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpDoctorQualification;

/**
 * SgpDoctorQualificationSearch represents the model behind the search form about `app\models\SgpDoctorQualification`.
 */
class SgpDoctorQualificationSearch extends SgpDoctorQualification
{
    public function rules()
    {
        return [
            [['id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['qualification_name', 'crt_dt', 'upd_dt'], 'safe'],
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
       // $query = SgpDoctorQualification::find();
        $query = SgpDoctorQualification::find()->where(["=", "sgp_doctor_qualification.is_deleted",0]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            //Sameer - Always search for non deleted records
           // 'is_deleted' => $this->is_deleted,
            'is_deleted' => 0,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        $query->andFilterWhere(['like', 'qualification_name', $this->qualification_name]);

        return $dataProvider;
    }
}
