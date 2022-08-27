<?php

namespace common\models\reserva;

use Yii;
use common\models\libros\Libros;
use common\models\users\Users;

/**
 * This is the model class for table "reserva".
 *
 * @property string $idreserva
 * @property string|null $idUser
 * @property string|null $idLibros
 * @property string|null $fechaR
 * @property string|null $estado
 *
 * @property Libros $idLibros0
 * @property Users $idUser0
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idreserva'], 'required'],
            [['fechaR'], 'safe'],
            [['estado'], 'string'],
            [['idreserva', 'idUser', 'idLibros'], 'string', 'max' => 15],
            [['idreserva'], 'unique'],
            [['idLibros'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::class, 'targetAttribute' => ['idLibros' => 'idLibros']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['idUser' => 'idUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idreserva' => 'Idreserva',
            'idUser' => 'Id User',
            'idLibros' => 'Id Libros',
            'fechaR' => 'Fecha R',
            'estado' => 'Estado',
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
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(Users::class, ['idUser' => 'idUser']);
    }

    /**
     * {@inheritdoc}
     * @return ReservaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReservaQuery(get_called_class());
    }
}
