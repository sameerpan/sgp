<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgpFileUpload;

/**
 * SgpFileUploadSearch represents the model behind the search form about `app\models\SgpFileUpload`.
 */
class SgpFileUploadSearch extends SgpFileUpload
{
    public function rules()
    {
        return [
            [['id', 'scope_territory', 'territory_id', 'is_deleted', 'crt_by', 'upd_by'], 'integer'],
            [['name', 'file_path', 'file_url', 'crt_dt', 'upd_dt'], 'safe'],
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
       // $query = SgpFileUpload::find();
        $query = SgpFileUpload::find()->where(["=", "is_deleted",0]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'scope_territory' => $this->scope_territory,
            'territory_id' => $this->territory_id,
            //Sameer - Always search for non deleted records
           // 'is_deleted' => $this->is_deleted,
            'is_deleted' => 0,
            'crt_dt' => $this->crt_dt,
            'crt_by' => $this->crt_by,
            'upd_dt' => $this->upd_dt,
            'upd_by' => $this->upd_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'file_path', $this->file_path])
            ->andFilterWhere(['like', 'file_url', $this->file_url]);

        return $dataProvider;
    }
}
