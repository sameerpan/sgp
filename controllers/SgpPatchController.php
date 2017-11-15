<?php

namespace app\controllers;

use Yii;
use app\models\SgpPatch;
use app\models\SgpPatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SgpPatchController implements the CRUD actions for SgpPatch model.
 */
class SgpPatchController extends Controller
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
     * Lists all SgpPatch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgpPatchSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SgpPatch model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get HQ data for dropdown list
        $hq_name = ArrayHelper::map(\app\models\SgpHq::getAllNotDeleted(), 'id', 'hq_name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          //Sameer - Changed to redirect to index if successfully saved
            //return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect('index');
        } else {
            return $this->render('view', [
                'model' => $model,
                // Sameer -Added items  
                'hq_name' => $hq_name                
                ]);
        }
    }

    /**
     * Creates a new SgpPatch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgpPatch;
        // Sameer -Get HQ data for dropdown list
        $hq_name = ArrayHelper::map(\app\models\SgpHq::getAllNotDeleted(), 'id', 'hq_name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                // Sameer -Added items  
                'hq_name' => $hq_name
            ]);
        }
    }

    /**
     * Updates an existing SgpPatch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get HQ data for dropdown list
        $hq_name = ArrayHelper::map(\app\models\SgpHq::getAllNotDeleted(), 'id', 'hq_name');
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
                'hq_name' => $hq_name
            ]);
        }
    }

    /**
     * Deletes an existing SgpPatch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Sameer- removing delete and setting is_deleted =1
        //$this->findModel($id)->delete();
        $patch=$this->findModel($id);
        $patch->is_deleted=1;
        $patch->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SgpPatch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SgpPatch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgpPatch::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
