<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use frontend\resource\Regiones;

class RegionesController extends ActiveController
{
    public $modelClass = Regiones::class;

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'sort' => [
                    'defaultOrder' => [
                        'orden' => SORT_ASC,
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
