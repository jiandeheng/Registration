<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Academy;

/**
 * AcademySearch represents the model behind the search form about `app\models\Academy`.
 */
class AcademySearch extends Academy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['academy_id'], 'integer'],
            [['academy_name'], 'safe'],
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
        $query = Academy::find();

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
            'academy_id' => $this->academy_id,
        ]);

        $query->andFilterWhere(['like', 'academy_name', $this->academy_name]);

        return $dataProvider;
    }
}
