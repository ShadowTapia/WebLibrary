<?php

namespace common\models\regiones;

use Yii;
use common\models\alumnos\Alumnos;
use common\models\provincias\Provincias;
use common\models\apoderados\Apoderados;

/**
 * This is the model class for table "regiones".
 *
 * @property int $codRegion
 * @property string $region
 * @property int|null $orden
 *
 * @property Alumnos[] $alumnos
 * @property Apoderados[] $apoderados
 * @property Provincias[] $provincias
 */
class Regiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codRegion', 'region'], 'required'],
            [['codRegion', 'orden'], 'integer'],
            [['region'], 'string', 'max' => 50],
            [['codRegion'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codRegion' => 'Cod Region',
            'region' => 'Region',
            'orden' => 'Orden',
        ];
    }

    /**
     * Gets query for [[Alumnos]].
     *
     * @return \yii\db\ActiveQuery|AlumnosQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumnos::class, ['codRegion' => 'codRegion']);
    }

    /**
     * Gets query for [[Apoderados]].
     *
     * @return \yii\db\ActiveQuery|ApoderadosQuery
     */
    public function getApoderados()
    {
        return $this->hasMany(Apoderados::class, ['codRegion' => 'codRegion']);
    }

    /**
     * Gets query for [[Provincias]].
     *
     * @return \yii\db\ActiveQuery|ProvinciasQuery
     */
    public function getProvincias()
    {
        return $this->hasMany(Provincias::class, ['codRegion' => 'codRegion']);
    }

    /**
     * {@inheritdoc}
     * @return RegionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegionesQuery(get_called_class());
    }
}
