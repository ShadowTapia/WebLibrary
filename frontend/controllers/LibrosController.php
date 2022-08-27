<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\resource\Libros;
use yii\data\ActiveDataProvider;

/**
 *  Class LibrosController
 * 
 * @autor  Marcelo Tapia <chelo.tapia@gmail.com>
 * @package frontend/controllers
 */
class LibrosController extends ActiveController
{
    public $modelClass = Libros::class;

    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Libros::find(),
        ]);
    }

    // public function actions()
    // {
    //     $actions = parent::actions();
    //     $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

    //     return $actions;
    // }

    // public function prepareDataProvider()
    // {
    //     return new ActiveDataProvider([
    //         'query' => $this->modelClass::find()->andWhere(['idautor' => \Yii::$app->request->get('idautor')])
    //     ]);
    // }
}
