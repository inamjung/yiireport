<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-success">
        <div class="panel-heading"><i class="glyphicon glyphicon-pencil"></i> เพื่มหน่วยงาน</div>
        <div class="panel-body">
            <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?=
    $form->field($model, 'group_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(app\models\Groups::find()->all(), 
                  
                    'id', 'namegroup'),
                    ['prompt'=>'<--เลือกกลุ่มงาน-->']
    )
    ?>
        </div>
          <div class="col-xs-8 col-sm-8 col-md-8">
            <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
            
        </div>
    </div>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-plus"></i> บันทัก' : 'บันทึก', 
    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
