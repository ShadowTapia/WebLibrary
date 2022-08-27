<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\resource\Apoderados;

class ApoderadosController extends ActiveController
{
    public $modelClass = Apoderados::class;
}
