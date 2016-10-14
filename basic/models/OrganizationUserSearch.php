<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrganizationUser;

/**
 * OrganizationUserSearch represents the model behind the search form about `app\models\OrganizationUser`.
 */
class OrganizationUserSearch extends OrganizationUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organization_user_id', 'organization_id'], 'integer'],
            [['organization_user_username', 'organization_user_password'], 'safe'],
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
        $query = OrganizationUser::find();

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
            'organization_user_id' => $this->organization_user_id,
            'organization_id' => $this->organization_id,
        ]);

        $query->andFilterWhere(['like', 'organization_user_username', $this->organization_user_username])
            ->andFilterWhere(['like', 'organization_user_password', $this->organization_user_password]);

        return $dataProvider;
    }
}
