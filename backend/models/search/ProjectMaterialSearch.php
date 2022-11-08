<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProjectMaterial;

/**
 * ProjectMaterialSearch represents the model behind the search form of `common\models\ProjectMaterial`.
 */
class ProjectMaterialSearch extends ProjectMaterial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'material_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['material_name', 'project_name', 'items', 'contract_title', 'activity_material', 'status'], 'safe'],
            [['material_budget'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProjectMaterial::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'material_id' => $this->material_id,
            'material_budget' => $this->material_budget,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'material_name', $this->material_name])
            ->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'items', $this->items])
            ->andFilterWhere(['like', 'contract_title', $this->contract_title])
            ->andFilterWhere(['like', 'activity_material', $this->activity_material])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
