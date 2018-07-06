<?php

namespace app\models\search;

use yii\base\Model;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/**
 * Class UserSearch
 * @package app\models\search
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['username', 'nickname'], 'string', 'max' => 20],
            [['username'], 'email'],
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
            'username' => $this->username,
            'nickname' => $this->nickname,
            'status' => $this->status
        ]);
        
        return $dataProvider;
    }
}
