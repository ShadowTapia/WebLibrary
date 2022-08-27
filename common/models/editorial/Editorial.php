<?php

namespace common\models\editorial;

use Yii;
use common\models\libros\Libros;

/**
 * This is the model class for table "editorial".
 *
 * @property int $ideditorial
 * @property string $nombre
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $mail
 *
 * @property Libros[] $libros
 */
class Editorial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'editorial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'direccion'], 'string', 'max' => 80],
            [['telefono'], 'string', 'max' => 45],
            [['mail'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ideditorial' => 'Ideditorial',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'mail' => 'Mail',
        ];
    }

    /**
     * Gets query for [[Libros]].
     *
     * @return \yii\db\ActiveQuery|LibrosQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::class, ['ideditorial' => 'ideditorial']);
    }

    /**
     * {@inheritdoc}
     * @return EditorialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EditorialQuery(get_called_class());
    }
}
