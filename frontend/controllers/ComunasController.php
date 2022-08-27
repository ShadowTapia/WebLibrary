<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\resource\Comunas;

class ComunasController extends ActiveController
{
    public $modelClass = Comunas::class;
}
