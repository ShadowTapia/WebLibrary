<?php

namespace common\models\autor;

use Yii;
use common\models\libros\Libros;

/**
 * This is the model class for table "autor".
 *
 * @property string $idautor
 * @property string|null $nombre
 * @property string|null $nacionalidad
 *
 * @property Libros[] $libros
 */
class Autor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idautor'], 'required'],
            [['idautor'], 'string', 'max' => 15],
            [['nombre'], 'string', 'max' => 60],
            [['nacionalidad'], 'string', 'max' => 45],
            [['idautor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idautor' => 'Idautor',
            'nombre' => 'Nombre',
            'nacionalidad' => 'Nacionalidad',
        ];
    }

    /**
     * Gets query for [[Libros]].
     *
     * @return \yii\db\ActiveQuery|LibrosQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::class, ['idautor' => 'idautor']);
    }

    /**
     * {@inheritdoc}
     * @return AutorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutorQuery(get_called_class());
    }
}
