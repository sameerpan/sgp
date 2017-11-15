<?php

namespace app\controllers;

use Yii;
use app\models\SgpDoctorDetails;
use app\models\SgpDoctorDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SgpDoctorDetailsController implements the CRUD actions for SgpDoctorDetails model.
 */
class SgpDoctorDetailsController extends Controller
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
     * Lists all SgpDoctorDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgpDoctorDetailsSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SgpDoctorDetails model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get contact details data for dropdown list
        $email = ArrayHelper::map(\app\models\SgpContactDetails::getAllNotDeleted(), 'id', 'email');
        // Sameer -Get Doctor Speciality data for dropdown list
       $speciality_name = ArrayHelper::map(\app\models\SgpDoctorSpeciality::getAllNotDeleted(), 'id', 'speciality_name');
        // Sameer -Get Doctor Speciality data for dropdown list
        $class_name = ArrayHelper::map(\app\models\SgpDoctorClass::getAllNotDeleted(), 'id', 'class_name'); 
        // Sameer -Get Doctor qualification data for dropdown list
        $qualification_name = ArrayHelper::map(\app\models\SgpDoctorQualification::getAllNotDeleted(), 'id', 'qualification_name'); 
        // Sameer -Get Patch data for dropdown list
        $patch_name = ArrayHelper::map(\app\models\SgpPatch::getAllNotDeleted(), 'id', 'patch_name'); 
        
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
                'speciality_name' => $speciality_name,
                'class_name' => $class_name,
                'qualification_name' => $qualification_name,
                'patch_name' => $patch_name,
                'contact_details' => $contact_details, 
                ]);
        }
    }

    /**
     * Creates a new SgpDoctorDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgpDoctorDetails;
        // Sameer -Get contact details data for dropdown list
        $email = ArrayHelper::map(\app\models\SgpContactDetails::getAllNotDeleted(), 'id', 'email');
        // Sameer -Get Doctor Speciality data for dropdown list
       $speciality_name = ArrayHelper::map(\app\models\SgpDoctorSpeciality::getAllNotDeleted(), 'id', 'speciality_name');
        // Sameer -Get Doctor Speciality data for dropdown list
        $class_name = ArrayHelper::map(\app\models\SgpDoctorClass::getAllNotDeleted(), 'id', 'class_name'); 
        // Sameer -Get Doctor qualification data for dropdown list
        $qualification_name = ArrayHelper::map(\app\models\SgpDoctorQualification::getAllNotDeleted(), 'id', 'qualification_name'); 
        // Sameer -Get Patch data for dropdown list
        $patch_name = ArrayHelper::map(\app\models\SgpPatch::getAllNotDeleted(), 'id', 'patch_name'); 
        
        
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
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                // Sameer -Added items  
                'email' => $email,
                'speciality_name' => $speciality_name,
                'class_name' => $class_name,
                'qualification_name' => $qualification_name,
                'patch_name' => $patch_name,
                'contact_details' => $contact_details,                 
            ]);
        }
    }

    /**
     * Updates an existing SgpDoctorDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // Sameer -Get contact details data for dropdown list
        $email = ArrayHelper::map(\app\models\SgpContactDetails::getAllNotDeleted(), 'id', 'email');
        // Sameer -Get Doctor Speciality data for dropdown list
       $speciality_name = ArrayHelper::map(\app\models\SgpDoctorSpeciality::getAllNotDeleted(), 'id', 'speciality_name');
        // Sameer -Get Doctor Speciality data for dropdown list
        $class_name = ArrayHelper::map(\app\models\SgpDoctorClass::getAllNotDeleted(), 'id', 'class_name'); 
        // Sameer -Get Doctor qualification data for dropdown list
        $qualification_name = ArrayHelper::map(\app\models\SgpDoctorQualification::getAllNotDeleted(), 'id', 'qualification_name'); 
        // Sameer -Get Patch data for dropdown list
        $patch_name = ArrayHelper::map(\app\models\SgpPatch::getAllNotDeleted(), 'id', 'patch_name');
        
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
           // return $this->redirect(['view', 'id' => $model->id]);
            return $this->render('index', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                // Sameer -Added items  
                'email' => $email,
                'speciality_name' => $speciality_name,
                'class_name' => $class_name,
                'qualification_name' => $qualification_name,
                'patch_name' => $patch_name,
                'contact_details' => $contact_details,                
            ]);
        }
    }

    /**
     * Deletes an existing SgpDoctorDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Sameer- removing delete and setting is_deleted =1
        //$this->findModel($id)->delete();
        $doctordetails=$this->findModel($id);
        $doctordetails->is_deleted=1;
        $doctordetails->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SgpDoctorDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SgpDoctorDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgpDoctorDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
