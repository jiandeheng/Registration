<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DepartmentUser;

/**
 * DepartmentUserSearch represents the model behind the search form about `app\models\DepartmentUser`.
 */
class DepartmentUserSearch extends DepartmentUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_user_id', 'department_id', 'organization_id'], 'integer'],
            [['department_user_username', 'department_user_password'], 'safe'],
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
        $query = DepartmentUser::find();

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
            'department_user_id' => $this->department_user_id,
            'department_id' => $this->department_id,
            'organization_id' => $this->organization_id,
        ]);

        $query->andFilterWhere(['like', 'department_user_username', $this->department_user_username])
            ->andFilterWhere(['like', 'department_user_password', $this->department_user_password]);

        return $dataProvider;
    }
}
