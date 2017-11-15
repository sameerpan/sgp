<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpPatch $model
 */

//Sameer - changed the title to show name
//$this->title = $model->id;
$this->title = Yii::t('app', 'Patches');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patches'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgp-patch-view">
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
           // 'hq_id',
                [           
                 'attribute' => 'hq',
                 'value' => $model->hq->hq_name,
                 'type' => DetailView::INPUT_DROPDOWN_LIST, 
                 'items'=>$hq_name,
               ],
            'patch_name',
         /*  'is_deleted',
            'is_delete_approved',
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
