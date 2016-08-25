<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
?>

<?php echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'สิบอันดับโรค OPD'],
        'xAxis'=>[
            'categories'=>$icdname
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(คน)']
        ],
        'series'=>[
            [
                'type'=>'line',
                'name'=>'จำนวน',
                'data'=>$a,
                'dataLabels'=>[
                    'enabled'=>true,
                ]
            ],
            
            
        ]
    ]
]);?>

<?php
$gridColumns=[
    ['class'=>'kartik\grid\SerialColumn'],    
    [
        'attribute'=>'pdx'
    ],
    [
        'attribute'=>'icdname'
    ],
    [
        'attribute'=>'a'
    ],    
    
];
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'columns' => $gridColumns,
    'responsive' => true,
    'hover' => true,
    'striped' => false,
    'floatHeader' => FALSE,
    'showPageSummary' => true,
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => 'สิบอันดับโรค OPD'
    ],
]);
?>


