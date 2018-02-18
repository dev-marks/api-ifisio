<?php

namespace app\controllers;

use app\models\TblServicos;
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


    /**
     * @return array|static[]
     * @throws \yii\base\InvalidConfigException
     * Action responsável pelas requisições com solicitações à tabela de serviços
     */
    public function actionServicos(){

        // Procedimentos para geração dos Models
        // 1 - Acesse o Gii (Ex.: http://127.0.0.1/webservice-ifisio/web/gii
        // 2 - Acesse a opção de geração de modelos
        // 3 - Gere os modelos das tabelas restantes
        // 4 - Adicione os modelos no topo do ApiController
        // 5 - Criar actions restantes

        // Modelo de JSON a ser enviado na carga da requisição
        //{"servico":{"descricao":"A","nome":"B","preco":"12.00"}} //Para a requisição do tipo POST


        /*
        GET /users: list all users page by page;
        POST /users: create a new user;
        GET /users/123: return the details of the user 123;
        HEAD /users/123: show the overview information of user 123;
        PATCH /users/123 and PUT /users/123: update the user 123;
        DELETE /users/123: delete the user 123;
        */

        if(Yii::$app->request->isPost){
            $dadosServico = Yii::$app->request->getBodyParams();


            if(is_array($dadosServico) && array_key_exists('servico',$dadosServico) && is_array($dadosServico['servico'])){
                $newServico = new TblServicos();
                $newServico->descricao = $dadosServico['descricao'];
                $newServico->nome   = $dadosServico['nome'];
                $newServico->Preco = $dadosServico['preco'];


                if($newServico->save()){
                    Yii::$app->response->statusCode = 201;
                }
                else{
                    return $newServico->getErrors();
                }
            }

        }
        else if(Yii::$app->request->isGet){
            return TblServicos::findAll([]);
        }
        else if(Yii::$app->request->isDelete){
            $idServico = Yii::$app->request->getBodyParams();

            if(TblServicos::deleteAll(['idservico'=>$idServico]) !== false){
                Yii::$app->response->statusCode = 201;
            }
        }
    }
}
