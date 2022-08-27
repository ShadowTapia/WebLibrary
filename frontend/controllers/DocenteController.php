<?php

namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController;
use frontend\resource\Docente;

class DocenteController extends ActiveController
{
    public $modelClass = Docente::class;

    public function errorResponse($message)
    {
        //Set response code to 400
        Yii::$app->response->statusCode = 400;

        return $this->asJson(['error' => $message]);
    }
}
