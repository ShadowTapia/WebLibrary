<?php

namespace common\models\provincias;

use Yii;
use common\models\regiones\Regiones;
use common\models\alumnos\Alumnos;
use common\models\apoderados\Apoderados;
use common\models\comunas\Comunas;

/**
 * This is the model class for table "provincias".
 *
 * @property int $idProvincia
 * @property string|null $Provincia
 * @property int|null $codRegion
 *
 * @property Alumnos[] $alumnos
 * @property Apoderados[] $apoderados
 * @property Regiones $codRegion0
 * @property Comunas[] $comunas
 */
class Provincias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provincias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codRegion'], 'integer'],
            [['Provincia'], 'string', 'max' => 45],
            [['codRegion'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::class, 'targetAttribute' => ['codRegion' => 'codRegion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProvincia' => 'Id Provincia',
            'Provincia' => 'Provincia',
            'codRegion' => 'Cod Region',
        ];
    }

    /**
     * Gets query for [[Alumnos]].
     *
     * @return \yii\db\ActiveQuery|AlumnosQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumnos::class, ['idProvincia' => 'idProvincia']);
    }

    /**
     * Gets query for [[Apoderados]].
     *
     * @return \yii\db\ActiveQuery|ApoderadosQuery
     */
    public function getApoderados()
    {
        return $this->hasMany(Apoderados::class, ['idProvincia' => 'idProvincia']);
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
     * Gets query for [[Comunas]].
     *
     * @return \yii\db\ActiveQuery|ComunasQuery
     */
    public function getComunas()
    {
        return $this->hasMany(Comunas::class, ['idProvincia' => 'idProvincia']);
    }

    /**
     * {@inheritdoc}
     * @return ProvinciasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProvinciasQuery(get_called_class());
    }
}
