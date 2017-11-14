<?php

namespace app\controllers;

use Yii;
use app\models\SgpChemistDetails;
use app\models\SgpChemistDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SgpChemistDetailsController implements the CRUD actions for SgpChemistDetails model.
 */
class SgpChemistDetailsController extends Controller
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
     * Lists all SgpChemistDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgpChemistDetailsSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SgpChemistDetails model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get Contact data for dropdown list
        $email = ArrayHelper::map(\app\models\SgpContactDetails::getAllNotDeleted(), 'id', 'email');      
        // Sameer -Get Contact data for dropdown list
        $hq_name = ArrayHelper::map(\app\models\SgpHq::getAllNotDeleted(), 'id', 'hq_name');
         // Sameer -Get another model detail
        $contact_details = new \app\models\SgpContactDetails;
        if ($model->load(Yii::$app->request->post()) && $contact_details->load(Yii::$app->request->post())) {
            
            $contact_details->upd_by=current_user+id;
            $contact_details->upd_dt=curent_date_time;
            $contact_details->crt_by=current_user+id;
            $contact_details->crt_dt=curent_date_time;

            $isValid=$contact_details->validate();
            $contact_details->save(false);
            $model->contact_id= $contact_details->id;
            $isvalid=$model->validate() && $isValid;
            if($isvalid){
                $model->save(false);
            }
          //Sameer - Changed to redirect to index if successfully saved
            //return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect('index');
        } else {
            return $this->render('view', [
                'model' => $model,
                  // Sameer -Added items
                'email' => $email,
                'hq_name' => $hq_name,
                'contact_details' => $contact_details,
                    ]);
        }
    }

    /**
     * Creates a new SgpChemistDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgpChemistDetails;
        // Sameer -Get Contact data for dropdown list
        $email = ArrayHelper::map(\app\models\SgpContactDetails::getAllNotDeleted(), 'id', 'email');      
        // Sameer -Get Contact data for dropdown list
        $hq_name = ArrayHelper::map(\app\models\SgpHq::getAllNotDeleted(), 'id', 'hq_name');
         // Sameer -Get another model detail
        $contact_details = new \app\models\SgpContactDetails;
        if ($model->load(Yii::$app->request->post()) && $contact_details->load(Yii::$app->request->post())) {
            
            $contact_details->upd_by=Yii::$app->user->id;
            $contact_details->upd_dt=Yii::$app->formatter->asDate('now', 'php:Y-m-d H:i:s A');
            $contact_details->crt_by=Yii::$app->user->id;
            $contact_details->crt_dt=Yii::$app->formatter->asDate('now', 'php:Y-m-d H:i:s A');
            $contact_details->is_deleted=0;
            $isValid=$contact_details->validate();
            if($isValid)
            {
            $contact_details->save(false);
            }
         else {  
           var_dump($contact_details->errors);
           
             }
            
            $model->contact_id= $contact_details->id;
//            echo "hii.<pre>";
//          //  print_r($model);
//            echo "</pre>";
            $isValid=$model->validate() && $isValid;


           if($isValid)
            {
            $model->save(false);
            }
         else {  
           var_dump($model->errors);           
             }

           // var_dump($model);
           return $this->redirect(['view', 'id' => $model->id]);
            
        } else {
            return $this->render('create', [
                'model' => $model,
               // Sameer -Added items
                'email' => $email,
                'hq_name' => $hq_name,
                'contact_details' => $contact_details,                
            ]);
        }
    }

    /**
     * Updates an existing SgpChemistDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get Contact data for dropdown list
        $email = ArrayHelper::map(\app\models\SgpContactDetails::getAllNotDeleted(), 'id', 'email');      
        // Sameer -Get Contact data for dropdown list
        $hq_name = ArrayHelper::map(\app\models\SgpHq::getAllNotDeleted(), 'id', 'hq_name');
        
         // Sameer -Get another model detail
        $contact_details = new \app\models\SgpContactDetails;
        if ($model->load(Yii::$app->request->post()) && $contact_details->load(Yii::$app->request->post())) {
            
//            $contact_details->upd_by=current_user+id;
//            $contact_details->upd_dt=curent_date_time;
//            $contact_details->crt_by=current_user+id;
//            $contact_details->crt_dt=curent_date_time;
            
            $contact_details->crt_by=current_user+id;           
            $contact_details->crt_dt=date('Y-m-d h:m:s');
            
            
            
            $isValid=$contact_details->validate();
            $contact_details->save(false);
            $model->contact_id= $contact_details->id;
            $isvalid=$model->validate() && $isValid;
            if($isvalid){
                $model->save(false);
            }
             //Sameer - Changed to redirect to index if successfully saved
           // return $this->redirect(['view', 'id' => $model->id]);
            return $this->render('index', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                // Sameer -Added items
                'email' => $email,
                'hq_name' => $hq_name,
                'contact_details' => $contact_details,                
            ]);
        }
    }

    /**
     * Deletes an existing SgpChemistDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Sameer- removing delete and setting is_deleted =1
        //$this->findModel($id)->delete();
        $chemistdetails=$this->findModel($id);
        $chemistdetails->is_deleted=1;
        $chemistdetails->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SgpChemistDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SgpChemistDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgpChemistDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
