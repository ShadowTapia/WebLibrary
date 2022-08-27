<?php

namespace common\models\pivot;

use Yii;
use common\models\anos\Anos;
use common\models\cursos\Cursos;
use common\models\apoderados\Apoderados;
use common\models\alumnos\Alumnos;

/**
 * This is the model class for table "pivot".
 *
 * @property int|null $idApo
 * @property string|null $idalumno
 * @property int|null $idano
 * @property string|null $motivo
 * @property int|null $idCurso
 * @property string|null $activo
 * @property string|null $retirado
 * @property string $idpivote
 *
 * @property Apoderados $idApo0
 * @property Cursos $idCurso0
 * @property Alumnos $idalumno0
 * @property Anos $idano0
 */
class Pivot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pivot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idApo', 'idano', 'idCurso'], 'integer'],
            [['activo', 'retirado'], 'string'],
            [['idpivote'], 'required'],
            [['idalumno', 'idpivote'], 'string', 'max' => 15],
            [['motivo'], 'string', 'max' => 50],
            [['idpivote'], 'unique'],
            [['idano'], 'exist', 'skipOnError' => true, 'targetClass' => Anos::class, 'targetAttribute' => ['idano' => 'idano']],
            [['idCurso'], 'exist', 'skipOnError' => true, 'targetClass' => Cursos::class, 'targetAttribute' => ['idCurso' => 'idCurso']],
            [['idalumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumnos::class, 'targetAttribute' => ['idalumno' => 'idalumno']],
            [['idApo'], 'exist', 'skipOnError' => true, 'targetClass' => Apoderados::class, 'targetAttribute' => ['idApo' => 'idApo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idApo' => 'Id Apo',
            'idalumno' => 'Idalumno',
            'idano' => 'Idano',
            'motivo' => 'Motivo',
            'idCurso' => 'Id Curso',
            'activo' => 'Activo',
            'retirado' => 'Retirado',
            'idpivote' => 'Idpivote',
        ];
    }

    /**
     * Gets query for [[IdApo0]].
     *
     * @return \yii\db\ActiveQuery|ApoderadosQuery
     */
    public function getIdApo0()
    {
        return $this->hasOne(Apoderados::class, ['idApo' => 'idApo']);
    }

    /**
     * Gets query for [[IdCurso0]].
     *
     * @return \yii\db\ActiveQuery|CursosQuery
     */
    public function getIdCurso0()
    {
        return $this->hasOne(Cursos::class, ['idCurso' => 'idCurso']);
    }

    /**
     * Gets query for [[Idalumno0]].
     *
     * @return \yii\db\ActiveQuery|AlumnosQuery
     */
    public function getIdalumno0()
    {
        return $this->hasOne(Alumnos::class, ['idalumno' => 'idalumno']);
    }

    /**
     * Gets query for [[Idano0]].
     *
     * @return \yii\db\ActiveQuery|AnosQuery
     */
    public function getIdano0()
    {
        return $this->hasOne(Anos::class, ['idano' => 'idano']);
    }

    /**
     * {@inheritdoc}
     * @return PivotQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PivotQuery(get_called_class());
    }
}
