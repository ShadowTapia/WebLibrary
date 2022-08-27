<?php

namespace frontend\resource;

class Alumnos extends \common\models\alumnos\Alumnos
{
    public function fields()
    {
        return ['rutalumno', 'digrut', 'nombrealu', 'paternoalu', 'maternoalu', 'idalumno'];
    }

    public function extraFields()
    {
        return ['sexo', 'nacionalidad', 'fechanac', 'fechaing', 'fecharet', 'nro', 'depto', 'block', 'villa', 'email', 'alergias', 'sangre', 'medicamentos', 'enfermedades',  'codRegion0', 'idProvincia0', 'codComuna0', 'apoderados', 'pivots', 'rutalumno0'];
    }
}
