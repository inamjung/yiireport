<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $gridColumns = [
    'department',
    'depgroup.namegroup',
//        'ชื่อฟิวด์',
    
];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
          'exportConfig' => [
                    ExportMenu::FORMAT_EXCEL => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_CSV => false,
                    ExportMenu::FORMAT_PDF => false,
                ],
        'columns'=>$gridColumns
]);
?>
    
    <?php echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],   
    'filterModel'=>$searchModel,    
    'responsive' => TRUE,
    'hover' => true,
    'floatHeader' => true,
    'panel' => [
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,        
    ],
    
    'columns' => [
        ['class'=>'kartik\grid\SerialColumn'],

            //'id',
            //'group_id',
            //'depgroup.namegroup',
            [
                'attribute'=>'group_id',
                'value'=>'depgroup.namegroup'
            ],
            'department',

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:80px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{view}</div>',                
                'buttons'=>[
                    
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-search"></i> รายละเอียด',$url,['class'=>'btn btn-info']);
                    }, 
                    'update'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',$url,['class'=>'btn btn-default']);
                    },
                    'delete'=>function($url,$model,$key){
                         return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,[
                                'title' => Yii::t('yii', 'Delete'),
                                'data-confirm' => Yii::t('yii', 'คุณต้องการลบไฟล์นี้?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class'=>'btn btn-default'
                                ]);
                    }
                ]
            ],         
        
    ]
]);
?>  
</div>
