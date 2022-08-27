<?php

namespace frontend\resource;

class Autor extends \common\models\autor\Autor
{
    public function fields()
    {
        return ['idautor', 'nombre', 'nacionalidad'];
    }

    public function extraFields()
    {
        return ['libros'];
    }
}
