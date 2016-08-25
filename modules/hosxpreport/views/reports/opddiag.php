<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
?>


<?php

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'pdx',
        'label' => 'รหัสโรค',
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'attribute' => 'icdname',
        'label' => 'ชื่อโรค',
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'attribute' => 'a',
        'label' => 'จำนวน',
        'headerOptions' => ['class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center'],
        'format' => 'raw',
        'value' => function($model)use($pdx) {
    return Html::a(Html::encode($model['a']), [
                'reports/indivopddiag',
                'pdx'=>$model['pdx']
                    ]
    );
}
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

<?php

echo Highcharts::widget([
    'options' => [
        'credits' => ['enabled' => false],
        'title' => ['text' => '๑๐ อันดับโรค OPD'],
        'xAxis' => [
            'categories' => $icdname
        ],
        'yAxis' => [
            'title' => ['text' => 'จำนวน(คน)']
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'จำนวน',
                'data' => $a,
                'dataLabels' => [
                    'enabled' => true,
                ],
            ],
        ]
    ]
]);
?>

