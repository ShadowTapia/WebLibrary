<?php

namespace common\models\users;

use Yii;
use common\models\alumnos\Alumnos;
use common\models\roles\Roles;
use common\models\docente\Docente;
use common\models\historico\Historico;
use common\models\prestamos\Prestamos;
use common\models\reserva\Reserva;

/**
 * This is the model class for table "users".
 *
 * @property string $idUser
 * @property string|null $UserName
 * @property string|null $UserLastName
 * @property string|null $UserPass
 * @property int|null $Idroles
 * @property int|null $UserRut
 * @property string|null $UserMail
 * @property string|null $authkey
 * @property string|null $accessToken
 * @property string|null $activate
 * @property string|null $verification_code
 *
 * @property Alumnos[] $alumnos
 * @property Docente $docente
 * @property Historico[] $historicos
 * @property Roles $idroles
 * @property Prestamos[] $prestamos
 * @property Reserva[] $reservas
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser'], 'required'],
            [['Idroles', 'UserRut'], 'integer'],
            [['activate'], 'string'],
            [['idUser'], 'string', 'max' => 15],
            [['UserName', 'UserLastName'], 'string', 'max' => 45],
            [['UserPass'], 'string', 'max' => 700],
            [['UserMail'], 'string', 'max' => 150],
            [['authkey', 'accessToken', 'verification_code'], 'string', 'max' => 255],
            [['UserRut'], 'unique'],
            [['idUser'], 'unique'],
            [['Idroles'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['Idroles' => 'idroles']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'UserName' => 'User Name',
            'UserLastName' => 'User Last Name',
            'UserPass' => 'User Pass',
            'Idroles' => 'Idroles',
            'UserRut' => 'User Rut',
            'UserMail' => 'User Mail',
            'authkey' => 'Authkey',
            'accessToken' => 'Access Token',
            'activate' => 'Activate',
            'verification_code' => 'Verification Code',
        ];
    }

    /**
     * Gets query for [[Alumnos]].
     *
     * @return \yii\db\ActiveQuery|AlumnosQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumnos::class, ['rutalumno' => 'UserRut']);
    }

    /**
     * Gets query for [[Docente]].
     *
     * @return \yii\db\ActiveQuery|DocenteQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::class, ['rutdocente' => 'UserRut']);
    }

    /**
     * Gets query for [[Historicos]].
     *
     * @return \yii\db\ActiveQuery|HistoricoQuery
     */
    public function getHistoricos()
    {
        return $this->hasMany(Historico::class, ['idUser' => 'idUser']);
    }

    /**
     * Gets query for [[Idroles]].
     *
     * @return \yii\db\ActiveQuery|RolesQuery
     */
    public function getIdroles()
    {
        return $this->hasOne(Roles::class, ['idroles' => 'Idroles']);
    }

    /**
     * Gets query for [[Prestamos]].
     *
     * @return \yii\db\ActiveQuery|PrestamosQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::class, ['idUser' => 'idUser']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery|ReservaQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['idUser' => 'idUser']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
