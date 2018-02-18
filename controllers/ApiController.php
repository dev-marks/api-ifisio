<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\TblUsuarios;
use yii\filters\ContentNegotiator;
use yii\web\Response;

class ApiController extends \yii\rest\Controller
{

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        /*
        GET /users: list all users page by page;
        POST /users: create a new user;
        GET /users/123: return the details of the user 123;
        HEAD /users/123: show the overview information of user 123;
        PATCH /users/123 and PUT /users/123: update the user 123;
        DELETE /users/123: delete the user 123;
        */

        //$params = Yii::$app->request->getBodyParams();

        /*
        $newUser = new TblUsuarios();

        $newUser->cpf = '08608273489';
        $newUser->dataNascimento = date('Y-m-d');
        $newUser->email = 'ronysilvati@live.com';
        $newUser->nome = 'Rony';
        $newUser->sobrenome = 'Silva';
        $newUser->sexo = 'M';


        if(!$newUser->save()){
            echo '<pre>';
            print_r($newUser->getErrors());
        }
        */

        //$listaUser = TblUsuarios::findAll(['idUsuario'=>1]);

        /*
        if(Yii::$app->request->isPost){
            die("s");
        }
        */

        /*
        $payload = Yii::$app->request->getBodyParams();

        echo '<pre>';
        print_r($payload);
        die();
        */

        Yii::$app->response->statusCode = 201;

        $json = array('nome'=>'Rony','email'=>'ronysilvati@Live.com');
        return $json;
        die("OK");


    }
}
