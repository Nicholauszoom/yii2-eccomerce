<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ActivityMaterial;

/**
 * ActivityMaterialSearch represents the model behind the search form of `common\models\ActivityMaterial`.
 */
class ActivityMaterialSearch extends ActivityMaterial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'activity_material_id', 'acticity_start_date', 'activity_end_date', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['activity_material_name', 'activity_name', 'items_quantity'], 'safe'],
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
        $query = ActivityMaterial::find();

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
            'activity_material_id' => $this->activity_material_id,
            'material_budget' => $this->material_budget,
            'acticity_start_date' => $this->acticity_start_date,
            'activity_end_date' => $this->activity_end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'activity_material_name', $this->activity_material_name])
            ->andFilterWhere(['like', 'activity_name', $this->activity_name])
            ->andFilterWhere(['like', 'items_quantity', $this->items_quantity]);

        return $dataProvider;
    }
}
