<?php

namespace app\controllers;

use Yii;
use app\models\SgpHq;
use app\models\SgpHqSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SgpHqController implements the CRUD actions for SgpHq model.
 */
class SgpHqController extends Controller
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
     * Lists all SgpHq models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgpHqSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

       return $this->render('index', [

            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SgpHq model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        // Sameer -Get Region data for dropdown list
        $region_name = ArrayHelper::map(\app\models\SgpRegion::getAllNotDeleted(), 'id', 'region_name');
       // Sameer -Get State data for dropdown list
        $state_names = ArrayHelper::map(\app\models\SgpState::getAllNotDeleted(), 'id', 'state_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          //Sameer - Changed to redirect to index if successfully saved
            //return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect('index');
        } else {
            return $this->render('view', [
                'model' => $model,               
                 // Sameer -Added items  
                'region_name' => $region_name,
                'state_names' => $state_names,
                ]);
         }
    }

    /**
     * Creates a new SgpHq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgpHq;

        
       // Sameer -Get Region data for dropdown list
        $region_name = ArrayHelper::map(\app\models\SgpRegion::getAllNotDeleted(), 'id', 'region_name');
       // Sameer -Get State data for dropdown list
        $state_names = ArrayHelper::map(\app\models\SgpState::getAllNotDeleted(), 'id', 'state_name');
     //   $patch = new \app\models\SgpPatch(); 
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,

               // Sameer -Added items  
                'region_name' => $region_name,
                'state_names' => $state_names,
              //  'patch' => $patch, 

            ]);
        }
    }

    /**
     * Updates an existing SgpHq model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       // Sameer -Get Region data for dropdown list
        $region_name = ArrayHelper::map(\app\models\SgpRegion::getAllNotDeleted(), 'id', 'region_name');
       // Sameer -Get State data for dropdown list
        $state_names = ArrayHelper::map(\app\models\SgpState::getAllNotDeleted(), 'id', 'state_name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             //Sameer - Changed to redirect to index if successfully saved
           // return $this->redirect(['view', 'id' => $model->id]);
            return $this->render('index', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'region_name' => $region_name,
                'state_names' => $state_names,

            ]);
        }
    }

    /**
     * Deletes an existing SgpHq model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

         //Sameer- removing delete and setting is_deleted =1
        //$this->findModel($id)->delete();
        $hq=$this->findModel($id);
        $hq->is_deleted=1;
        $hq->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SgpHq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SgpHq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgpHq::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
