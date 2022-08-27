<?php

namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController;
use frontend\resource\Autor;

class AutorController extends ActiveController
{
    public $modelClass = Autor::class;

    public function errorResponse($message)
    {
        //Set response code to 400
        Yii::$app->response->statusCode = 400;

        return $this->asJson(['error' => $message]);
    }
}
