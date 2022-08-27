<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\resource\Alumnos;

class AlumnosController extends ActiveController
{
    public $modelClass = Alumnos::class;
}
