<?php

namespace app\controllers;

use Yii;
use app\models\Usuarios;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex($t) {
        $searchModel = new UsuariosSearch();
        if ($t == 'a') {
            $searchModel->tipo = 0;
        } else {
            $searchModel->tipo = 1;
        }

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'tipo' => $t,
        ]);
    }

    /**
     * Displays a single Usuarios model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($t) {
        $model = new Usuarios();
        if ($t == 'a') {
            $model->tipo = 0;
        } else {
            $model->tipo = 1;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'tipo' => $t,
        ]);
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionTestFelderSilverman() {
           
        $model = $this->findModel(Yii::$app->user->identity->id);

        if ($model->load(Yii::$app->request->post())) {
            $activo = 0;
            $reflexivo = 0;
            $sensitivo = 0;
            $intuitivo = 0;
            $visual = 0;
            $verbal = 0;
            $secuencial = 0;
            $global = 0;
            $b = true;
            $estiloAprendizaje = '';

            for ($i = 1; $i <= 44; $i++) {
                $respuesta = "preg" . $i;
                if (isset($model->$respuesta)) {
                    switch ($i) {
                        case 1:
                        case 5:
                        case 9:
                        case 13:
                        case 17:
                        case 21:
                        case 25:
                        case 29:
                        case 33:
                        case 37:
                        case 41:
                            if ($model->$respuesta == 'a') {
                                $activo += 1;
                            } else {
                                $reflexivo += 1;
                            }
                            break;
                        case 2:
                        case 6:
                        case 10:
                        case 14:
                        case 18:
                        case 22:
                        case 26:
                        case 30:
                        case 34:
                        case 38:
                        case 42:
                            if ($model->$respuesta == 'a') {
                                $sensitivo += 1;
                            } else {
                                $intuitivo += 1;
                            }
                            break;
                        case 3:
                        case 7:
                        case 11:
                        case 15:
                        case 19:
                        case 23:
                        case 27:
                        case 31:
                        case 35:
                        case 39:
                        case 43:
                            if ($model->$respuesta == 'a') {
                                $visual += 1;
                            } else {
                                $verbal += 1;
                            }
                            break;
                        case 4:
                        case 8:
                        case 12:
                        case 16:
                        case 20:
                        case 24:
                        case 28:
                        case 32:
                        case 36:
                        case 40:
                        case 44:
                            if ($model->$respuesta == 'a') {
                                $secuencial += 1;
                            } else {
                                $global += 1;
                            }
                            break;
                    }
                } else {
                    $b = false;
                    break;
                }
            }

            if ($b) {
                if ($activo > $reflexivo) {
                    $estiloAprendizaje = "ACT" . $activo . " - ";
                } elseif ($activo < $reflexivo) {
                    $estiloAprendizaje = "REF" . $reflexivo . " - ";
                } else {
                    $estiloAprendizaje = "NAR" . " - ";
                }

                if ($sensitivo > $intuitivo) {
                    $estiloAprendizaje .= "SEN" . $sensitivo . " - ";
                } elseif ($sensitivo < $intuitivo) {
                    $estiloAprendizaje .= "INT" . $intuitivo . " - ";
                } else {
                    $estiloAprendizaje .= "NSI" . " - ";
                }

                if ($visual > $verbal) {
                    $estiloAprendizaje .= "VIS" . $visual . " - ";
                } elseif ($visual < $verbal) {
                    $estiloAprendizaje .= "VER" . $verbal . " - ";
                } else {
                    $estiloAprendizaje .= "NVV" . " - ";
                }

                if ($secuencial > $global) {
                    $estiloAprendizaje .= "SEC" . $secuencial;
                } elseif ($secuencial < $global) {
                    $estiloAprendizaje .= "GLO" . $global;
                } else {
                    $estiloAprendizaje .= "NSG";
                }

                $model->estiloaprendizaje = $estiloAprendizaje;

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    echo strlen($model->estiloaprendizaje);
                    var_dump($model->errors);
                    echo "estamos en problema...";
                }
            } else {
                echo "Hay preguntas a las que no respondio. No se puede determinar el estilo de aprendizaje.";
            }
        } else {

            return $this->render('test-felder-silverman', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
