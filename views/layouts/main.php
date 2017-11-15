<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'SGP',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
 //           ['label' => 'Home', 'url' => ['/site/index']],
//           ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
           !Yii::$app->user->isGuest?
            ['label' => 'Master',  
                'url' => ['#'],
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'State', 'url' => ['/sgp-state/index']],
                    ['label' => 'Region', 'url' => ['/sgp-region/index']],
                    ['label' => 'Hq', 'url' => ['/sgp-hq/index']],             
                    ['label' => 'Patch', 'url' => ['/sgp-patch/index']],            
                    ['label' => 'Designation', 'url' => ['/sgp-designation/index']],
                    ['label' => 'Target', 'url' => ['/sgp-target/index']],
                    ['label' => 'Route', 'url' => ['/sgp-route/index']],                
                    ['label' => 'Route Rate', 'url' => ['/sgp-route-rates/index']],         
                    ['label' => 'Doctor Speciality', 'url' => ['/sgp-doctor-speciality/index']],         
                    ['label' => 'Doctor Qualification', 'url' => ['/sgp-doctor-qualification/index']],            
                    ['label' => 'Doctor Class', 'url' => ['/sgp-doctor-class/index']],           
                    ['label' => 'Doctor Details', 'url' => ['/sgp-doctor-details/index']],            
                    ['label' => 'Stockiest Details', 'url' => ['/sgp-stockiest-details/index']],                
                    ['label' => 'Chemist Details', 'url' => ['/sgp-chemist-details/index']],                 
                    ['label' => 'Holiday', 'url' => ['/sgp-holiday/index']],             
                    ['label' => 'Gifts', 'url' => ['/sgp-gifts/index']],           
                    ['label' => 'Expense Type', 'url' => ['/sgp-expense-type/index']],             
                    ['label' => 'File Upload', 'url' => ['/sgp-file-upload/index']],
                     
                ],'visible' => Yii::$app->user->can('admin')]:"",
              
           !Yii::$app->user->isGuest?
           ['label' => 'MR', 'url' => ['/site/mr'],'visible' => Yii::$app->user->can('mr')]:"",
           !Yii::$app->user->isGuest?
           ['label' => 'ASM', 'url' => ['/site/asm'],'visible' => Yii::$app->user->can('asm')]:"",
           !Yii::$app->user->isGuest?
           ['label' => 'RSM', 'url' => ['/site/rsm'],'visible' => Yii::$app->user->can('rsm')]:"",
           !Yii::$app->user->isGuest?
           ['label' => 'SM', 'url' => ['/site/sm'],'visible' => Yii::$app->user->can('sm')]:"",
            
           /*Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )*/
			//Added for user/dectrium
			Yii::$app->user->isGuest ?
			['label' => 'Sign in', 'url' => ['/user/security/login']] :
        
			['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
				'url' => ['/user/security/logout'],
			'linkOptions' => ['data-method' => 'post']],
			['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
            
        ],

        
        
    ]);
        
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; SGP.. <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
