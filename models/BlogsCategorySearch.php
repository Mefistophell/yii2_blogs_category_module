<?php

namespace nill\blogs_category\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use nill\blogs_category\models\BlogsCategory;

/**
 * BlogsCategorySearch represents the model behind the search form about `app\models\BlogsCategory`.
 */
class BlogsCategorySearch extends BlogsCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category_name', 'category_description'], 'safe'],
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
        $query = BlogsCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'category_description', $this->category_description]);

        return $dataProvider;
    }
}
