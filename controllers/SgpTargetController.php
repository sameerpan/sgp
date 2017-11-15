<?php

namespace app\controllers;

use Yii;
use app\models\SgpTarget;
use app\models\SgpTargetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SgpTargetController implements the CRUD actions for SgpTarget model.
 */
class SgpTargetController extends Controller
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
     * Lists all SgpTarget models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgpTargetSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SgpTarget model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get Territory Type data for dropdown list
        $territory_type = ArrayHelper::map(\app\models\SgpTerritoryType::getAllNotDeleted(), 'id', 'name');  
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          //Sameer - Changed to redirect to index if successfully saved
            //return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect('index');
        } else {
            return $this->render('view', [
                'model' => $model,
                // Sameer -Added items  
                'territory_type' => $territory_type
                ]);
        }
    }

    /**
     * Creates a new SgpTarget model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgpTarget;
        // Sameer -Get Territory Type data for dropdown list
        $items = ArrayHelper::map(\app\models\SgpTerritoryType::getAllNotDeleted(), 'id', 'name');        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                // Sameer -Added items  
                'items' => $items
            ]);
        }
    }

    /**
     * Updates an existing SgpTarget model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get Territory Type data for dropdown list
        $territory_type = ArrayHelper::map(\app\models\SgpTerritoryType::getAllNotDeleted(), 'id', 'name');   
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
                'territory_type' => $territory_type
            ]);
        }
    }

    /**
     * Deletes an existing SgpTarget model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
   
        //Sameer- removing delete and setting is_deleted =1
        //$this->findModel($id)->delete();
        $target= $this->findModel($id);
        $target->is_deleted=1;
        $target->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SgpTarget model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SgpTarget the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgpTarget::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
