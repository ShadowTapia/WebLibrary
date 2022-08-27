<?php

namespace common\models\apoderados;

use Yii;
use common\models\comunas\Comunas;
use common\models\provincias\Provincias;
use common\models\regiones\Regiones;
use common\models\alumnos\Alumnos;

/**
 * This is the model class for table "apoderados".
 *
 * @property int $rutapo
 * @property string|null $digrut
 * @property string $nombreapo
 * @property string $apepat
 * @property string $apemat
 * @property string|null $calle
 * @property string|null $nro
 * @property string|null $depto
 * @property string|null $block
 * @property string|null $villa
 * @property int|null $codRegion
 * @property int|null $idProvincia
 * @property int|null $codComuna
 * @property string|null $fono
 * @property string|null $email
 * @property string|null $celular
 * @property string|null $estudios
 * @property string|null $niveledu
 * @property string|null $profesion
 * @property string|null $trabajoplace
 * @property string|null $relacion
 * @property string|null $apoderado
 * @property int|null $rutalumno
 * @property int $idApo
 *
 * @property Comunas $codComuna0
 * @property Regiones $codRegion0
 * @property Provincias $idProvincia0
 * @property Pivot[] $pivots
 * @property Alumnos $rutalumno0
 */
class Apoderados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apoderados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rutapo', 'codRegion', 'idProvincia', 'codComuna', 'rutalumno'], 'integer'],
            [['nombreapo', 'apepat', 'apemat'], 'required'],
            [['relacion', 'apoderado'], 'string'],
            [['digrut'], 'string', 'max' => 1],
            [['nombreapo', 'villa', 'fono'], 'string', 'max' => 25],
            [['apepat', 'apemat'], 'string', 'max' => 20],
            [['calle'], 'string', 'max' => 30],
            [['nro', 'depto'], 'string', 'max' => 8],
            [['block'], 'string', 'max' => 5],
            [['email'], 'string', 'max' => 150],
            [['celular'], 'string', 'max' => 12],
            [['estudios', 'niveledu', 'profesion'], 'string', 'max' => 60],
            [['trabajoplace'], 'string', 'max' => 70],
            [['codComuna'], 'exist', 'skipOnError' => true, 'targetClass' => Comunas::class, 'targetAttribute' => ['codComuna' => 'codComuna']],
            [['idProvincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincias::class, 'targetAttribute' => ['idProvincia' => 'idProvincia']],
            [['codRegion'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::class, 'targetAttribute' => ['codRegion' => 'codRegion']],
            [['rutalumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumnos::class, 'targetAttribute' => ['rutalumno' => 'rutalumno']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rutapo' => 'Rutapo',
            'digrut' => 'Digrut',
            'nombreapo' => 'Nombreapo',
            'apepat' => 'Apepat',
            'apemat' => 'Apemat',
            'calle' => 'Calle',
            'nro' => 'Nro',
            'depto' => 'Depto',
            'block' => 'Block',
            'villa' => 'Villa',
            'codRegion' => 'Cod Region',
            'idProvincia' => 'Id Provincia',
            'codComuna' => 'Cod Comuna',
            'fono' => 'Fono',
            'email' => 'Email',
            'celular' => 'Celular',
            'estudios' => 'Estudios',
            'niveledu' => 'Niveledu',
            'profesion' => 'Profesion',
            'trabajoplace' => 'Trabajoplace',
            'relacion' => 'Relacion',
            'apoderado' => 'Apoderado',
            'rutalumno' => 'Rutalumno',
            'idApo' => 'Id Apo',
        ];
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
        return $this->hasMany(Pivot::class, ['idApo' => 'idApo']);
    }

    /**
     * Gets query for [[Rutalumno0]].
     *
     * @return \yii\db\ActiveQuery|AlumnosQuery
     */
    public function getRutalumno0()
    {
        return $this->hasOne(Alumnos::class, ['rutalumno' => 'rutalumno']);
    }

    /**
     * {@inheritdoc}
     * @return ApoderadosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApoderadosQuery(get_called_class());
    }
}
