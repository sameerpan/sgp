<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpDoctorClass;

/**
 * SgpDoctorClassSearch represents the model behind the search form about `app\models\SgpDoctorClass`.
 */
class SgpDoctorClassSearch extends SgpDoctorClass
{
    public function rules()
    {
        return [
            [['id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['class_name', 'crt_dt', 'upd_dt'], 'safe'],
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
       // $query = SgpDoctorClass::find();
        $query = SgpDoctorClass::find()->where(["=", "sgp_doctor_class.is_deleted",0]);
        
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

        $query->andFilterWhere(['like', 'class_name', $this->class_name]);

        return $dataProvider;
    }
}
