<?php

namespace common\models\alumnos;

use Yii;
use common\models\pivot\Pivot;
use common\models\comunas\Comunas;
use common\models\provincias\Provincias;
use common\models\apoderados\Apoderados;
use common\models\regiones\Regiones;
use common\models\users\Users;

/**
 * This is the model class for table "alumnos".
 *
 * @property int|null $rutalumno
 * @property string|null $digrut
 * @property string|null $sexo
 * @property string $nombrealu
 * @property string $paternoalu
 * @property string $maternoalu
 * @property string|null $calle
 * @property string|null $nro
 * @property string|null $depto
 * @property string|null $block
 * @property string|null $villa
 * @property int|null $codRegion
 * @property int|null $idProvincia
 * @property int|null $codComuna
 * @property string|null $email
 * @property string|null $fono
 * @property string|null $fechanac
 * @property string|null $nacionalidad
 * @property string|null $fechaing
 * @property string|null $fecharet
 * @property string|null $sangre
 * @property string|null $enfermedades
 * @property string|null $alergias
 * @property string|null $medicamentos
 * @property string $idalumno
 *
 * @property Apoderados[] $apoderados
 * @property Comunas $codComuna0
 * @property Regiones $codRegion0
 * @property Provincias $idProvincia0
 * @property Pivot[] $pivots
 * @property Users $rutalumno0
 */
class Alumnos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumnos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rutalumno', 'codRegion', 'idProvincia', 'codComuna'], 'integer'],
            [['sexo', 'nacionalidad'], 'string'],
            [['nombrealu', 'paternoalu', 'maternoalu', 'idalumno'], 'required'],
            [['fechanac', 'fechaing', 'fecharet'], 'safe'],
            [['digrut'], 'string', 'max' => 1],
            [['nombrealu', 'alergias'], 'string', 'max' => 50],
            [['paternoalu', 'maternoalu', 'sangre'], 'string', 'max' => 20],
            [['calle', 'medicamentos'], 'string', 'max' => 80],
            [['nro', 'depto'], 'string', 'max' => 8],
            [['block'], 'string', 'max' => 5],
            [['villa', 'fono'], 'string', 'max' => 25],
            [['email', 'enfermedades'], 'string', 'max' => 150],
            [['idalumno'], 'string', 'max' => 15],
            [['idalumno'], 'unique'],
            [['codComuna'], 'exist', 'skipOnError' => true, 'targetClass' => Comunas::class, 'targetAttribute' => ['codComuna' => 'codComuna']],
            [['idProvincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincias::class, 'targetAttribute' => ['idProvincia' => 'idProvincia']],
            [['codRegion'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::class, 'targetAttribute' => ['codRegion' => 'codRegion']],
            [['rutalumno'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['rutalumno' => 'UserRut']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rutalumno' => 'Rutalumno',
            'digrut' => 'Digrut',
            'sexo' => 'Sexo',
            'nombrealu' => 'Nombrealu',
            'paternoalu' => 'Paternoalu',
            'maternoalu' => 'Maternoalu',
            'calle' => 'Calle',
            'nro' => 'Nro',
            'depto' => 'Depto',
            'block' => 'Block',
            'villa' => 'Villa',
            'codRegion' => 'Cod Region',
            'idProvincia' => 'Id Provincia',
            'codComuna' => 'Cod Comuna',
            'email' => 'Email',
            'fono' => 'Fono',
            'fechanac' => 'Fechanac',
            'nacionalidad' => 'Nacionalidad',
            'fechaing' => 'Fechaing',
            'fecharet' => 'Fecharet',
            'sangre' => 'Sangre',
            'enfermedades' => 'Enfermedades',
            'alergias' => 'Alergias',
            'medicamentos' => 'Medicamentos',
            'idalumno' => 'Idalumno',
        ];
    }

    /**
     * Gets query for [[Apoderados]].
     *
     * @return \yii\db\ActiveQuery|ApoderadosQuery
     */
    public function getApoderados()
    {
        return $this->hasMany(Apoderados::class, ['rutalumno' => 'rutalumno']);
    }

    /**
     * Gets query for [[CodComuna0]].
     *
     * @return \yii\db\ActiveQuery|ComunasQuery
     */
    public function getCodComuna0()
    {
        return $this->hasOne(Comunas::class, ['codComuna' => 'codComuna']);
    }

    /**
     * Gets query for [[CodRegion0]].
     *
     * @return \yii\db\ActiveQuery|RegionesQuery
     */
    public function getCodRegion0()
    {
        return $this->hasOne(Regiones::class, ['codRegion' => 'codRegion']);
    }

    /**
     * Gets query for [[IdProvincia0]].
     *
     * @return \yii\db\ActiveQuery|ProvinciasQuery
     */
    public function getIdProvincia0()
    {
        return $this->hasOne(Provincias::class, ['idProvincia' => 'idProvincia']);
    }

    /**
     * Gets query for [[Pivots]].
     *
     * @return \yii\db\ActiveQuery|PivotQuery
     */
    public function getPivots()
    {
        return $this->hasMany(Pivot::class, ['idalumno' => 'idalumno']);
    }

    /**
     * Gets query for [[Rutalumno0]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getRutalumno0()
    {
        return $this->hasOne(Users::class, ['UserRut' => 'rutalumno']);
    }

    /**
     * {@inheritdoc}
     * @return AlumnosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlumnosQuery(get_called_class());
    }
}
