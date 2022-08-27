<?php

namespace common\models\docente;

use Yii;
use common\models\users\Users;

/**
 * This is the model class for table "docente".
 *
 * @property int $rutdocente
 * @property string|null $digito
 * @property string $nombres
 * @property string $paterno
 * @property string $materno
 * @property string|null $calle
 * @property string|null $numero
 * @property string|null $depto
 * @property string|null $block
 * @property string|null $villa
 * @property int|null $codRegion
 * @property int|null $idProvincia
 * @property int|null $codComuna
 * @property string|null $telefono
 * @property string|null $email
 *
 * @property Users $rutdocente0
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rutdocente', 'nombres', 'paterno', 'materno'], 'required'],
            [['rutdocente', 'codRegion', 'idProvincia', 'codComuna'], 'integer'],
            [['digito'], 'string', 'max' => 1],
            [['nombres', 'villa', 'telefono'], 'string', 'max' => 25],
            [['paterno', 'materno'], 'string', 'max' => 20],
            [['calle'], 'string', 'max' => 30],
            [['numero', 'depto'], 'string', 'max' => 8],
            [['block'], 'string', 'max' => 5],
            [['email'], 'string', 'max' => 150],
            [['rutdocente'], 'unique'],
            [['rutdocente'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['rutdocente' => 'UserRut']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rutdocente' => 'Rutdocente',
            'digito' => 'Digito',
            'nombres' => 'Nombres',
            'paterno' => 'Paterno',
            'materno' => 'Materno',
            'calle' => 'Calle',
            'numero' => 'Numero',
            'depto' => 'Depto',
            'block' => 'Block',
            'villa' => 'Villa',
            'codRegion' => 'Cod Region',
            'idProvincia' => 'Id Provincia',
            'codComuna' => 'Cod Comuna',
            'telefono' => 'Telefono',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Rutdocente0]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getRutdocente0()
    {
        return $this->hasOne(Users::class, ['UserRut' => 'rutdocente']);
    }

    /**
     * {@inheritdoc}
     * @return DocenteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DocenteQuery(get_called_class());
    }
}
