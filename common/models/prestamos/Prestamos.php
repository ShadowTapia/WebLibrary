<?php

namespace common\models\prestamos;

use Yii;
use common\models\users\Users;
use common\models\ejemplar\Ejemplar;

/**
 * This is the model class for table "prestamos".
 *
 * @property string $idPrestamo
 * @property string|null $idUser
 * @property string|null $idejemplar
 * @property string|null $norden
 * @property string|null $fechapres
 * @property string|null $fechadev
 * @property string|null $notas
 *
 * @property Users $idUser0
 * @property Ejemplar $idejemplar0
 */
class Prestamos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prestamos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPrestamo'], 'required'],
            [['fechapres', 'fechadev'], 'safe'],
            [['idPrestamo', 'idUser', 'idejemplar'], 'string', 'max' => 15],
            [['norden'], 'string', 'max' => 5],
            [['notas'], 'string', 'max' => 255],
            [['idPrestamo'], 'unique'],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['idUser' => 'idUser']],
            [['idejemplar'], 'exist', 'skipOnError' => true, 'targetClass' => Ejemplar::class, 'targetAttribute' => ['idejemplar' => 'idejemplar']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPrestamo' => 'Id Prestamo',
            'idUser' => 'Id User',
            'idejemplar' => 'Idejemplar',
            'norden' => 'Norden',
            'fechapres' => 'Fechapres',
            'fechadev' => 'Fechadev',
            'notas' => 'Notas',
        ];
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
     * Gets query for [[Idejemplar0]].
     *
     * @return \yii\db\ActiveQuery|EjemplarQuery
     */
    public function getIdejemplar0()
    {
        return $this->hasOne(Ejemplar::class, ['idejemplar' => 'idejemplar']);
    }

    /**
     * {@inheritdoc}
     * @return PrestamosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrestamosQuery(get_called_class());
    }
}
