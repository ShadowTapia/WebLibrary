<?php

namespace common\models\libros;

use Yii;
use common\models\autor\Autor;
use common\models\ejemplar\Ejemplar;
use common\models\reserva\Reserva;
use common\models\categorias\Categorias;
use common\models\editorial\Editorial;
use common\models\temas\Temas;
use common\models\numejem\Numejem;

/**
 * This is the model class for table "libros".
 *
 * @property string $idLibros
 * @property int|null $isbn
 * @property string|null $titulo
 * @property string|null $subtitulo
 * @property string|null $descripcion
 * @property int|null $numpag
 * @property int|null $ano
 * @property string|null $idioma
 * @property string|null $formato
 * @property int $idcategoria
 * @property int $ideditorial
 * @property string $idautor
 * @property int $idtemas
 * @property string|null $imagen
 *
 * @property Ejemplar[] $ejemplars
 * @property Autor $idautor0
 * @property Categorias $idcategoria0
 * @property Editorial $ideditorial0
 * @property Temas $idtemas0
 * @property Numejem $numejem
 * @property Reserva[] $reservas
 */
class Libros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLibros', 'idcategoria', 'ideditorial', 'idautor', 'idtemas'], 'required'],
            [['isbn', 'numpag', 'ano', 'idcategoria', 'ideditorial', 'idtemas'], 'integer'],
            [['idioma', 'formato', 'imagen'], 'string'],
            [['idLibros', 'idautor'], 'string', 'max' => 15],
            [['titulo'], 'string', 'max' => 60],
            [['subtitulo'], 'string', 'max' => 80],
            [['descripcion'], 'string', 'max' => 400],
            [['idLibros'], 'unique'],
            [['idautor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::class, 'targetAttribute' => ['idautor' => 'idautor']],
            [['idcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['idcategoria' => 'idcategoria']],
            [['ideditorial'], 'exist', 'skipOnError' => true, 'targetClass' => Editorial::class, 'targetAttribute' => ['ideditorial' => 'ideditorial']],
            [['idtemas'], 'exist', 'skipOnError' => true, 'targetClass' => Temas::class, 'targetAttribute' => ['idtemas' => 'idtemas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLibros' => 'Id Libros',
            'isbn' => 'Isbn',
            'titulo' => 'Titulo',
            'subtitulo' => 'Subtitulo',
            'descripcion' => 'Descripcion',
            'numpag' => 'Numpag',
            'ano' => 'Ano',
            'idioma' => 'Idioma',
            'formato' => 'Formato',
            'idcategoria' => 'Idcategoria',
            'ideditorial' => 'Ideditorial',
            'idautor' => 'Idautor',
            'idtemas' => 'Idtemas',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[Ejemplars]].
     *
     * @return \yii\db\ActiveQuery|EjemplarQuery
     */
    public function getEjemplars()
    {
        return $this->hasMany(Ejemplar::class, ['idLibros' => 'idLibros']);
    }

    /**
     * Gets query for [[Idautor0]].
     *
     * @return \yii\db\ActiveQuery|AutorQuery
     */
    public function getIdautor0()
    {
        return $this->hasOne(Autor::class, ['idautor' => 'idautor']);
    }

    /**
     * Gets query for [[Idcategoria0]].
     *
     * @return \yii\db\ActiveQuery|CategoriasQuery
     */
    public function getIdcategoria0()
    {
        return $this->hasOne(Categorias::class, ['idcategoria' => 'idcategoria']);
    }

    /**
     * Gets query for [[Ideditorial0]].
     *
     * @return \yii\db\ActiveQuery|EditorialQuery
     */
    public function getIdeditorial0()
    {
        return $this->hasOne(Editorial::class, ['ideditorial' => 'ideditorial']);
    }

    /**
     * Gets query for [[Idtemas0]].
     *
     * @return \yii\db\ActiveQuery|TemasQuery
     */
    public function getIdtemas0()
    {
        return $this->hasOne(Temas::class, ['idtemas' => 'idtemas']);
    }

    /**
     * Gets query for [[Numejem]].
     *
     * @return \yii\db\ActiveQuery|NumejemQuery
     */
    public function getNumejem()
    {
        return $this->hasOne(Numejem::class, ['idLibros' => 'idLibros']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery|ReservaQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['idLibros' => 'idLibros']);
    }

    /**
     * {@inheritdoc}
     * @return LibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosQuery(get_called_class());
    }
}
