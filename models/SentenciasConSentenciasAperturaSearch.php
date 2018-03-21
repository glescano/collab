<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SentenciasConSentenciasApertura;

/**
 * SentenciasConSentenciasAperturaSearch represents the model behind the search form of `app\models\SentenciasConSentenciasApertura`.
 */
class SentenciasConSentenciasAperturaSearch extends SentenciasConSentenciasApertura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sentencias_id', 'sentencias_apertura_id'], 'integer'],
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
        $query = SentenciasConSentenciasApertura::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sentencias_id' => $this->sentencias_id,
            'sentencias_apertura_id' => $this->sentencias_apertura_id,
        ]);

        return $dataProvider;
    }
}
