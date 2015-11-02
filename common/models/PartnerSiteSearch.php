<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PartnerSite;

/**
 * PartnerSiteSearch represents the model behind the search form about `common\models\PartnerSite`.
 */
class PartnerSiteSearch extends PartnerSite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['icon_site', 'name_site', 'url_site'], 'safe'],
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
        $query = PartnerSite::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!isset($params['sort']) or $params['sort'] === '')
        {
            $query->orderBy('sort');
        }        

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'icon_site', $this->icon_site])
            ->andFilterWhere(['like', 'name_site', $this->name_site])
            ->andFilterWhere(['like', 'url_site', $this->url_site]);

        return $dataProvider;
    }
}
