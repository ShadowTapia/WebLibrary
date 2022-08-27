<?php

namespace common\models\numejem;

use Yii;
use common\models\libros\Libros;

/**
 * This is the model class for table "numejem".
 *
 * @property string $idLibros
 * @property int|null $numlibros
 * @property int|null $numdispos
 *
 * @property Libros $idLibros0
 */
class Numejem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'numejem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLibros'], 'required'],
            [['numlibros', 'numdispos'], 'integer'],
            [['idLibros'], 'string', 'max' => 15],
            [['idLibros'], 'unique'],
            [['idLibros'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::class, 'targetAttribute' => ['idLibros' => 'idLibros']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLibros' => 'Id Libros',
            'numlibros' => 'Numlibros',
            'numdispos' => 'Numdispos',
        ];
    }

    /**
     * Gets query for [[IdLibros0]].
     *
     * @return \yii\db\ActiveQuery|LibrosQuery
     */
    public function getIdLibros0()
    {
        return $this->hasOne(Libros::class, ['idLibros' => 'idLibros']);
    }

    /**
     * {@inheritdoc}
     * @return NumejemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NumejemQuery(get_called_class());
    }
}
