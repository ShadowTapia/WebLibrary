<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\resource\Provincias;

class ProvinciasController extends ActiveController
{
    public $modelClass = Provincias::class;
}
