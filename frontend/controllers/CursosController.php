<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\resource\Cursos;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * Class CursosController
 * 
 * @autor  Marcelo Tapia <chelo.tapia@gmail.com>
 * @package frontend/controllers
 */
class CursosController extends ActiveController
{
    public $modelClass = Cursos::class;

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'sort' => [
                    'defaultOrder' => [
                        'Orden' => SORT_ASC,
                    ],
                ],
            ],
        ]);
    }

    public function errorResponse($message)
    {
        //Set response code to 400
        Yii::$app->response->statusCode = 400;

        return $this->asJson(['error' => $message]);
    }
}
