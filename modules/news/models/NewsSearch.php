<?php

    namespace app\modules\news\models;

    use Yii;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;

    /**
     * newsSearch represents the model behind the search form about `app\models\news`.
     */
    class newsSearch extends news
    {
        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [
                    [
                        'id',
                        'content',
                        'description',
                        'created_at',
                        'updated_at'
                    ],
                    'integer'
                ],
                [['name', 'url', 'news_image'], 'safe'],
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
            $query = news::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'forcePageParam' => false,
                    'pageSizeParam' => false,
                    'pageSize' => 5
                ]
            ]);

            $this->load($params);

            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                // $query->where('0=1');
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id' => $this->id,
                'content' => $this->content,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]);

            $query->andFilterWhere(['like', 'name', $this->name]);

            return $dataProvider;
        }
    }