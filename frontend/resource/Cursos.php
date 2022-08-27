<?php

namespace frontend\resource;

class Cursos extends \common\models\cursos\Cursos
{
    public function fields()
    {
        return ['idCurso', 'Nombre', 'Orden', 'visible'];
    }
}
