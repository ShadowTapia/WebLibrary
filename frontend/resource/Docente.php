<?php

namespace frontend\resource;

class Docente extends \common\models\docente\Docente
{
    /**
     * Principales campos a mostrar
     */
    public function fields()
    {
        return [
            'id' => 'rutdocente', //El nombre del campo en la BBDD es rutdocente y lo cambiamos a id
            'digito',
            'nombres',
            'paterno',
            'materno'
        ];
    }

    /**
     * Extra campos para consultas
     */
    public function extraFields()
    {
        return ['villa', 'telefono', 'calle', 'numero', 'depto', 'block', 'email', 'codRegion', 'idProvincia', 'codComuna'];
    }
}
