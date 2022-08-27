<?php

namespace common\models\ejemplar;

use Yii;
use common\models\libros\Libros;
use common\models\historico\Historico;
use common\models\prestamos\Prestamos;

/**
 * This is the model class for table "ejemplar".
 *
 * @property string $idejemplar
 * @property string|null $norden
 * @property string|null $edicion
 * @property string|null $ubicacion
 * @property string $idLibros
 * @property string|null $fechain
 * @property string|null $fechaout
 * @property int|null $disponible
 *
 * @property Historico[] $historicos
 * @property Libros $idLibros0
 * @property Prestamos[] $prestamos
 */
class Ejemplar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ejemplar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idejemplar', 'idLibros'], 'required'],
            [['fechain', 'fechaout'], 'safe'],
            [['disponible'], 'integer'],
            [['idejemplar', 'idLibros'], 'string', 'max' => 15],
            [['norden'], 'string', 'max' => 5],
            [['edicion', 'ubicacion'], 'string', 'max' => 20],
            [['idejemplar'], 'unique'],
            [['idLibros'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::class, 'targetAttribute' => ['idLibros' => 'idLibros']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idejemplar' => 'Idejemplar',
            'norden' => 'Norden',
            'edicion' => 'Edicion',
            'ubicacion' => 'Ubicacion',
            'idLibros' => 'Id Libros',
            'fechain' => 'Fechain',
            'fechaout' => 'Fechaout',
            'disponible' => 'Disponible',
        ];
    }

    /**
     * Gets query for [[Historicos]].
     *
     * @return \yii\db\ActiveQuery|HistoricoQuery
     */
    public function getHistoricos()
    {
        return $this->hasMany(Historico::class, ['idejemplar' => 'idejemplar']);
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
     * Gets query for [[Prestamos]].
     *
     * @return \yii\db\ActiveQuery|PrestamosQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::class, ['idejemplar' => 'idejemplar']);
    }

    /**
     * {@inheritdoc}
     * @return EjemplarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EjemplarQuery(get_called_class());
    }
}
