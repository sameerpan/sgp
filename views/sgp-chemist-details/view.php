<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpChemistDetails $model
 */
//Sameer - changed the title to show name
//$this->title = $model->id;
$this->title = Yii::t('app', 'Chemist Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chemist Details'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-chemist-details-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
          //Sameer - removed attributes that are not required to be displayed         
        'attributes' => [
//            'id',
            'name',
         //   'contact_id',
           [           
               'attribute' => 'contact_id',
               'value' => $model->contact->email,
               'type' => DetailView::INPUT_DROPDOWN_LIST, 
               'items'=>$email,
           ],
              //           'Phone',
           [           
               'attribute' => 'phone',
               'value' => $model->contact->phone,
            //   'type' => DetailView::INPUT_DROPDOWN_LIST, 
            //   'items' => $contact_details,
           ],
            
          //           'address1',
           [           
               'attribute' => 'address1',
               'value' => $model->contact->address1,
             //  'type' => DetailView::INPUT_DROPDOWN_LIST, 
             //  'items' => $contact_details,
           ],
          //           'address2',
           [           
               'attribute' => 'address2',
               'value' => $model->contact->address2,
              // 'type' => DetailView::INPUT_DROPDOWN_LIST, 
              // 'items' => $contact_details,
           ],
           //           'city',           
            [           
               'attribute' => 'city',
               'value' => $model->contact->city,
              // 'type' => DetailView::INPUT_DROPDOWN_LIST, 
              // 'items' => $contact_details,
           ],           
         //   'hq_id',
            [           
               'attribute' => 'hq_id',
               'value' => $model->hq->hq_name,
               'type' => DetailView::INPUT_DROPDOWN_LIST, 
               'items'=>$hq_name,
           ],
            'gst',
         /*   'is_deleted',
            [
                'attribute' => 'crt_dt',
                'format' => [
                    'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime']))
                        ? Yii::$app->modules['datecontrol']['displaySettings']['datetime']
                        : 'd-m-Y H:i:s A'
                ],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATETIME
                ]
            ],
           // 'crt_by',
            
            //Sameer-Changed updated by to show username instead of id
            ['attribute' => 'upd_by', 'value' => \dektrium\user\models\User::findOne($model->upd_by)->username, 'mode'=>DetailView::MODE_VIEW],
            [
                'attribute' => 'upd_dt',
                'format' => [
                    'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime']))
                        ? Yii::$app->modules['datecontrol']['displaySettings']['datetime']
                        : 'd-m-Y H:i:s A'
                ],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATETIME
                ]
            ],*/
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
