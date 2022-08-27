<?php

namespace common\models\categorias;

use Yii;
use common\models\libros\Libros;

/**
 * This is the model class for table "categorias".
 *
 * @property int $idcategoria
 * @property string|null $categoria
 *
 * @property Libros[] $libros
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcategoria' => 'Idcategoria',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * Gets query for [[Libros]].
     *
     * @return \yii\db\ActiveQuery|LibrosQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::class, ['idcategoria' => 'idcategoria']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriasQuery(get_called_class());
    }
}
