<?php

namespace app\controllers;

use Yii;
use app\models\SgpDesignation;
use app\models\SgpDesignationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SgpDesignationController implements the CRUD actions for SgpDesignation model.
 */
class SgpDesignationController extends Controller
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
     * Lists all SgpDesignation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgpDesignationSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SgpDesignation model.
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
     * Creates a new SgpDesignation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgpDesignation;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SgpDesignation model.
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
     * Deletes an existing SgpDesignation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Sameer- removing delete and setting is_deleted =1
        //$this->findModel($id)->delete();
        $designation=$this->findModel($id);
        $designation->is_deleted=1;
        $designation->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SgpDesignation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SgpDesignation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgpDesignation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
