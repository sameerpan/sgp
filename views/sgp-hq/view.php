<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpHq $model
 */

//Sameer - changed the title to show name
//$this->title = $model->id;
$this->title = Yii::t('app', 'Hqs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hqs'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-hq-view">
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
        'attributes' => [
//            'id',
 //           'region_id',           
                [           
                   'attribute' => 'region',
                   'value' => $model->region->region_name,
                   'type' => DetailView::INPUT_DROPDOWN_LIST, 
                   'items'=>$region_name
               ],

  //          'state_id',           
               [
                   'attribute' => 'state',
                   'value' => $model->state->state_name,
                   'type' => DetailView::INPUT_DROPDOWN_LIST, 
                   'items'=>$state_names
               ],
            
            'hq_name',
//            'is_deleted',
//            [
//                'attribute' => 'crt_dt',
//                'format' => [
//                    'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime']))
//                        ? Yii::$app->modules['datecontrol']['displaySettings']['datetime']
//                        : 'd-m-Y H:i:s A'
//                ],
//                'type' => DetailView::INPUT_WIDGET,
//                'widgetOptions' => [
//                    'class' => DateControl::classname(),
//                    'type' => DateControl::FORMAT_DATETIME
//                ]
//            ],
//            'crt_by',
//            [
//                'attribute' => 'upd_dt',
//                'format' => [
//                    'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime']))
//                        ? Yii::$app->modules['datecontrol']['displaySettings']['datetime']
//                        : 'd-m-Y H:i:s A'
//                ],
//                'type' => DetailView::INPUT_WIDGET,
//                'widgetOptions' => [
//                    'class' => DateControl::classname(),
//                    'type' => DateControl::FORMAT_DATETIME
//                ]
//            ],
//            'upd_by',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
