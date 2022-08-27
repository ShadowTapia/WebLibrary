<?php

namespace common\models\temas;

use Yii;
use common\models\libros\Libros;

/**
 * This is the model class for table "temas".
 *
 * @property int $idtemas
 * @property string $nombre
 * @property string $codtemas
 *
 * @property Libros[] $libros
 */
class Temas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'codtemas'], 'required'],
            [['nombre'], 'string', 'max' => 100],
            [['codtemas'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtemas' => 'Idtemas',
            'nombre' => 'Nombre',
            'codtemas' => 'Codtemas',
        ];
    }

    /**
     * Gets query for [[Libros]].
     *
     * @return \yii\db\ActiveQuery|LibrosQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::class, ['idtemas' => 'idtemas']);
    }

    /**
     * {@inheritdoc}
     * @return TemasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TemasQuery(get_called_class());
    }
}
