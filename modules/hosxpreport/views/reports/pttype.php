<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['method' => 'get',
'action' => Url::to(['reports/pttype']),]); ?>

<div class="well">
    ระหว่างวันที่:
        <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ],
            'options'=>[
                'class'=>'form-control'
            ],
        ]);
        ?>           
        ถึงวันที่:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ],
            'options'=>[
                'class'=>'form-control'
            ],            
        ]);
        ?>
        </div>        
        <?php
            $list = ['10' => 'จ่ายสด', '89' => 'บัตรทอง'];
            echo Select2::widget([
                'name' => 'pttype',
                'data' => $list,
                'value' => $pttype,
                'size' => Select2::MEDIUM,
                'options' => ['placeholder' => 'เลือก สิทธิ์..'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>  
        <div class="col-xs-4 col-sm-4 col-md-2">
            <button class='btn btn-danger'>ประมวลผล</button>
        </div>    
         
</div>      
</div>

<?php ActiveForm::end();?>
<?php

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute'=>'vstdate',
        'label'=>'วันที่',
        'headerOptions'=>['class'=>'text-center'],
        'contentOptions'=>['class'=>'text-center']
    ],
    [
        'attribute'=>'hn',
        'label'=>'HN',
        'headerOptions'=>['class'=>'text-center']
    ],    
    [
        'attribute'=>'pname',
        'label'=>'คำนำหน้า',
        'headerOptions'=>['class'=>'text-center']
    ],
    [
        'attribute'=>'fname',
        'label'=>'ชื่อ',
        'headerOptions'=>['class'=>'text-center'],
        'contentOptions'=>['class'=>'text-center']
    ], 
    [
        'attribute'=>'lname',
        'label'=>'สกุล',
        'headerOptions'=>['class'=>'text-center']
    ],
    [
        'attribute'=>'pttype',
        'label'=>'สิทธิ์',
        'headerOptions'=>['class'=>'text-center'],
        'contentOptions'=>['class'=>'text-left']
    ],
    [
        'attribute'=>'pdx',
        'label'=>'โรค',
        'headerOptions'=>['class'=>'text-center'],
        'contentOptions'=>['class'=>'text-center']
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
    //'showPageSummary' => true,
    'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'heading' => 'สิบอันดับโรค OPD'
    ],
]);
?>

