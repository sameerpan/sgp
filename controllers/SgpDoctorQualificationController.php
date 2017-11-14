<?php

namespace app\controllers;

use Yii;
use app\models\SgpDoctorQualification;
use app\models\SgpDoctorQualificationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SgpDoctorQualificationController implements the CRUD actions for SgpDoctorQualification model.
 */
class SgpDoctorQualificationController extends Controller
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
     * Lists all SgpDoctorQualification models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgpDoctorQualificationSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SgpDoctorQualification model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          //Sameer - Changed to redirect to index if successfully saved
            //return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect('index');
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new SgpDoctorQualification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgpDoctorQualification;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SgpDoctorQualification model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             //Sameer - Changed to redirect to index if successfully saved
           // return $this->redirect(['view', 'id' => $model->id]);
            return $this->render('index', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SgpDoctorQualification model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Sameer- removing delete and setting is_deleted =1
        //$this->findModel($id)->delete();
        $region=$this->findModel($id);
        $region->is_deleted=1;
        $region->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SgpDoctorQualification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SgpDoctorQualification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgpDoctorQualification::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
