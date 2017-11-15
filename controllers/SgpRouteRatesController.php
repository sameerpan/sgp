<?php

namespace app\controllers;

use Yii;
use app\models\SgpRouteRates;
use app\models\SgpRouteRatesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SgpRouteRatesController implements the CRUD actions for SgpRouteRates model.
 */
class SgpRouteRatesController extends Controller
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
        ];
    }

    /**
     * Lists all SgpRouteRates models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgpRouteRatesSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SgpRouteRates model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get designation data for dropdown list
        $designation_name = ArrayHelper::map(\app\models\SgpDesignation::getAllNotDeleted(), 'id', 'designation_name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          //Sameer - Changed to redirect to index if successfully saved
            //return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect('index');
        } else {
            return $this->render('view', [
                'model' => $model,
                // Sameer -Added items  
                'designation_name' => $designation_name 
                  ]);
        }
    }

    /**
     * Creates a new SgpRouteRates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgpRouteRates;
        // Sameer -Get designation data for dropdown list
        $designation_name = ArrayHelper::map(\app\models\SgpDesignation::getAllNotDeleted(), 'id', 'designation_name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                // Sameer -Added items  
                'designation_name' => $designation_name,          
            ]);
        }
    }

    /**
     * Updates an existing SgpRouteRates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get designation data for dropdown list
        $designation_name = ArrayHelper::map(\app\models\SgpDesignation::getAllNotDeleted(), 'id', 'designation_name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             //Sameer - Changed to redirect to index if successfully saved
           // return $this->redirect(['view', 'id' => $model->id]);
            return $this->render('index', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                // Sameer -Added items  
                'designation_name' => $designation_name 
            ]);
        }
    }

    /**
     * Deletes an existing SgpRouteRates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Sameer- removing delete and setting is_deleted =1
        //$this->findModel($id)->delete();
        $routerates=$this->findModel($id);
        $routerates->is_deleted=1;
        $routerates->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SgpRouteRates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SgpRouteRates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgpRouteRates::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
