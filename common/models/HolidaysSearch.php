<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Holidays;

/**
 * HolidaysSearch represents the model behind the search form about `common\models\Holidays`.
 */
class HolidaysSearch extends Holidays
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by'], 'integer'],
            [['slug', 'name_holiday', 'text_holiday', 'date_holiday', 'logo_holiday', 'status_holiday', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Holidays::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_holiday' => $this->date_holiday,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'name_holiday', $this->name_holiday])
            ->andFilterWhere(['like', 'text_holiday', $this->text_holiday])
            ->andFilterWhere(['like', 'logo_holiday', $this->logo_holiday])
            ->andFilterWhere(['like', 'status_holiday', $this->status_holiday]);

        return $dataProvider;
    }
}
