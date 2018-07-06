<?php

namespace app\models\search;

use yii\base\Model;
use app\models\Nav;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/**
 * Class NavSearch
 * @package app\models\search
 */
class NavSearch extends Nav
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 20],
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

        $query->andFilterWhere([
            'name' =>$this->name,
            'status' =>$this->status
        ]);
        
        return $dataProvider;
    }
}
