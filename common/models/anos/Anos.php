<?php

namespace common\models\anos;

use Yii;
use common\models\pivot\Pivot;

/**
 * This is the model class for table "anos".
 *
 * @property int $idano
 * @property string|null $nombreano
 * @property string|null $activo
 *
 * @property Pivot[] $pivots
 */
class Anos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombreano'], 'safe'],
            [['activo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idano' => 'Idano',
            'nombreano' => 'Nombreano',
            'activo' => 'Activo',
        ];
    }

    /**
     * Gets query for [[Pivots]].
     *
     * @return \yii\db\ActiveQuery|PivotQuery
     */
    public function getPivots()
    {
        return $this->hasMany(Pivot::class, ['idano' => 'idano']);
    }

    /**
     * {@inheritdoc}
     * @return AnosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnosQuery(get_called_class());
    }
}
