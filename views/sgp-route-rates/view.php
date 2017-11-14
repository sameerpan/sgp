<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpRouteRates $model
 */
//Sameer - changed the title to show name
//$this->title = $model->id;
$this->title = Yii::t('app', 'Route Rates');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sgp Route Rates'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-route-rates-view">
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
           // 'designation_id',
                [           
                   'attribute' => 'designation',
                   'value' => $model->designation->designation_name,
                   'type' => DetailView::INPUT_DROPDOWN_LIST, 
                   'items'=>$designation_name
               ],
            'rate',
            [
                'attribute' => 'from_date',
                'format' => [
                    'date', (isset(Yii::$app->modules['datecontrol']['displaySettings']['date']))
                        ? Yii::$app->modules['datecontrol']['displaySettings']['date']
                        : 'd-m-Y'
                ],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATE,'displayFormat' => 'php:d-M-Y'
                ]
            ],
            [
                'attribute' => 'to_date',
                'format' => [
                    'date', (isset(Yii::$app->modules['datecontrol']['displaySettings']['date']))
                        ? Yii::$app->modules['datecontrol']['displaySettings']['date']
                        : 'd-m-Y'
                ],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATE,'displayFormat' => 'php:d-M-Y'
                ]
            ],
        /*    'is_deleted',
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
            'crt_by',
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
