<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_organization_id', 'user_department_id', 'status'], 'integer'],
            [['user_name', 'user_tel', 'user_email', 'user_birthday', 'user_academy', 'user_major', 'user_introduction', 'user_reason'], 'safe'],
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
        $query = User::find();

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
            'user_id' => $this->user_id,
            'user_organization_id' => $this->user_organization_id,
            'user_department_id' => $this->user_department_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'user_tel', $this->user_tel])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'user_birthday', $this->user_birthday])
            ->andFilterWhere(['like', 'user_academy', $this->user_academy])
            ->andFilterWhere(['like', 'user_major', $this->user_major])
            ->andFilterWhere(['like', 'user_introduction', $this->user_introduction])
            ->andFilterWhere(['like', 'user_reason', $this->user_reason]);

        return $dataProvider;
    }
}
