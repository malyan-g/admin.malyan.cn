<?php

namespace app\models\search;

use yii\base\Model;
use app\models\Article;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/**
 * Class ArticleSearch
 * @package app\models\search
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(Array $params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => ArrayHelper::getValue($params, 'per-page', 10)
            ],
        ]);

        $this->load($params);

        if(!$this->validate()) {
            return $dataProvider;
        }

        $query->filterWhere(['status' => $this->status]);
        
        return $dataProvider;
    }
}
