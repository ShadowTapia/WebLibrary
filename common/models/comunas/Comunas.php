<?php

namespace common\models\comunas;

use Yii;
use common\models\alumnos\Alumnos;
use common\models\apoderados\Apoderados;
use common\models\provincias\Provincias;

/**
 * This is the model class for table "comunas".
 *
 * @property int $codComuna
 * @property string $comuna
 * @property int|null $idProvincia
 *
 * @property Alumnos[] $alumnos
 * @property Apoderados[] $apoderados
 * @property Provincias $idProvincia0
 */
class Comunas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comunas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comuna'], 'required'],
            [['idProvincia'], 'integer'],
            [['comuna'], 'string', 'max' => 25],
            [['idProvincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincias::class, 'targetAttribute' => ['idProvincia' => 'idProvincia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codComuna' => 'Cod Comuna',
            'comuna' => 'Comuna',
            'idProvincia' => 'Id Provincia',
        ];
    }

    /**
     * Gets query for [[Alumnos]].
     *
     * @return \yii\db\ActiveQuery|AlumnosQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumnos::class, ['codComuna' => 'codComuna']);
    }

    /**
     * Gets query for [[Apoderados]].
     *
     * @return \yii\db\ActiveQuery|ApoderadosQuery
     */
    public function getApoderados()
    {
        return $this->hasMany(Apoderados::class, ['codComuna' => 'codComuna']);
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
     * {@inheritdoc}
     * @return ComunasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComunasQuery(get_called_class());
    }
}
