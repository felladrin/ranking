<?php

namespace app\controllers;

use Yii;
use app\models\JogadorPorJogo;
use app\models\JogadorPorJogoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JogadorPorJogoController implements the CRUD actions for JogadorPorJogo model.
 */
class JogadorPorJogoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all JogadorPorJogo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JogadorPorJogoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JogadorPorJogo model.
     * @param integer $jogador_id
     * @param integer $jogo_id
     * @return mixed
     */
    public function actionView($jogador_id, $jogo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($jogador_id, $jogo_id),
        ]);
    }

    /**
     * Creates a new JogadorPorJogo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JogadorPorJogo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            JogadorPorJogo::atualizarPontuacao();
            return $this->redirect(['view', 'jogador_id' => $model->jogador_id, 'jogo_id' => $model->jogo_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JogadorPorJogo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $jogador_id
     * @param integer $jogo_id
     * @return mixed
     */
    public function actionUpdate($jogador_id, $jogo_id)
    {
        $model = $this->findModel($jogador_id, $jogo_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            JogadorPorJogo::atualizarPontuacao();
            return $this->redirect(['view', 'jogador_id' => $model->jogador_id, 'jogo_id' => $model->jogo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JogadorPorJogo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $jogador_id
     * @param integer $jogo_id
     * @return mixed
     */
    public function actionDelete($jogador_id, $jogo_id)
    {
        $this->findModel($jogador_id, $jogo_id)->delete();
        JogadorPorJogo::atualizarPontuacao();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JogadorPorJogo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $jogador_id
     * @param integer $jogo_id
     * @return JogadorPorJogo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($jogador_id, $jogo_id)
    {
        if (($model = JogadorPorJogo::findOne(['jogador_id' => $jogador_id, 'jogo_id' => $jogo_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
