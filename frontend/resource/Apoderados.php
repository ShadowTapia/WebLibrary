<?php

namespace frontend\resource;

class Apoderados extends \common\models\apoderados\Apoderados
{
    public function fields()
    {
        return ['rutapo', 'digrut', 'nombreapo', 'apepat', 'apemat', 'fono', 'email'];
    }

    public function extraFields()
    {
        return ['calle', 'nro', 'depto', 'block', 'villa', 'celular', 'estudios', 'niveledu', 'profesion', 'trabajoplace', 'relacion', 'codRegion0', 'idProvincia0', 'codComuna0', 'rutalumno0', 'pivots'];
    }
}
