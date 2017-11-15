<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpDoctorDetails;

/**
 * SgpDoctorDetailsSearch represents the model behind the search form about `app\models\SgpDoctorDetails`.
 */
class SgpDoctorDetailsSearch extends SgpDoctorDetails
{
    public function rules()
    {
        return [
            //Sameer - Changed 'contact_id', 'speciality_id', 'class_id', 'qualification_id', 'patch_id' on safe field search field name 
            [['id', 'is_deleted', 'crt_dt', 'crt_by', 'upd_by'], 'integer'],
            [['first_name', 'last_name', 'date_of_birth', 'contact_id', 'speciality_id', 'class_id', 'qualification_id', 'patch_id', 'upd_dt'], 'safe'],
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
        //$query = SgpDoctorDetails::find();
         $query = SgpDoctorDetails::find()->where(["=", "sgp_doctor_details.is_deleted",0]);
         
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        //Sameer -Added join query 'contact_id', 'speciality_id', 'class_id', 'qualification_id', 'patch_id'
        $query->joinWith('contact');
        $query->joinWith('speciality');
        $query->joinWith('class');
        $query->joinWith('qualification');
        $query->joinWith('patch');
        
        $query->andFilterWhere([
            'id' => $this->id,
            //Sameer -comment 'contact_id', 'speciality_id', 'class_id', 'qualification_id', 'patch_id'
            //'contact_id' => $this->contact_id,
            'date_of_birth' => $this->date_of_birth,
            //'speciality_id' => $this->speciality_id,
            //'class_id' => $this->class_id,
            //'qualification_id' => $this->qualification_id,
            //'patch_id' => $this->patch_id,
            //Sameer - Always search for non deleted records
           // 'is_deleted' => $this->is_deleted,
            'sgp_doctor_details.is_deleted' => 0,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);
        
        $query->andFilterWhere(['like', 'first_name', $this->first_name])
              ->andFilterWhere(['like', 'last_name', $this->last_name])
              //Sameer -Added join query 'contact_id', 'speciality_id', 'class_id', 'qualification_id', 'patch_id'
              ->andFilterWhere(['like', 'sgp_contact_details.email', $this->contact_id])
              ->andFilterWhere(['like', 'sgp_doctor_speciality.speciality_name', $this->speciality_id])
              ->andFilterWhere(['like', 'sgp_doctor_class.class_name', $this->class_id])
              ->andFilterWhere(['like', 'sgp_doctor_qualification.qualification_name', $this->qualification_id])
              ->andFilterWhere(['like', 'sgp_patch.patch_name', $this->patch_id]);

        return $dataProvider;
    }
}
