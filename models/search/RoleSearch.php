<?php

namespace app\models\search;

use yii\base\Model;
use app\models\AuthItem;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

class RoleSearch extends AuthItem
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $this->type = self::TYPE_ROLE;
        return parent::behaviors(); // TODO: Change the autogenerated stub
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
        $query = self::find()->where(['type' => self::TYPE_ROLE]);

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
            'name' => $this->name
        ]);

        return $dataProvider;
    }
}