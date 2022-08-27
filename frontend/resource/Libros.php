<?php

namespace frontend\resource;

class Libros extends \common\models\libros\Libros
{
    public function fields()
    {
        return ['idLibros', 'isbn', 'titulo', 'subtitulo', 'ano'];
    }

    public function extraFields()
    {
        return ['descripcion', 'numpag', 'idioma', 'formato', 'ejemplars', 'idautor0', 'idcategoria0', 'ideditorial0', 'idtemas0', 'numejem', 'reservas'];
    }
}
