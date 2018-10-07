<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\RefPegawaiPenilaian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-pegawai-penilaian-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <div id="message"></div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'nip')->widget(MaskedInput::class, [
                'mask' => '99999999 999999 9 999'
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
        <?= $form->field($model, 'unit')->widget(Select2::classname(), [
            'data' => Yii::$app->params['unit'],
            'options' => ['placeholder' => 'Unit'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?> 
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->widget(MaskedInput::class, [
                'clientOptions' => [
                    'alias' =>  'email'
                ],
            ]) ?>
        </div>
        <div class="col-md-4">
            <?php if($model->isNewRecord) $model->telepon = "+628"  ?> 
            <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$script = <<<JS
$('form#{$model->formName()}').on('beforeSubmit',function(e)
{
    var \$form = $(this);
    $.post(
        \$form.attr("action"), //serialize Yii2 form 
        \$form.serialize()
    )
        .done(function(result){
            if(result == 1)
            {
                $.pjax.reload({container:'#sekolah-pjax'});
                $(\$form).trigger("reset"); //reset form to reuse it to input
            }else
            {
                $("#message").html(result);
            }
        }).fail(function(){
            console.log("server error");
        });
    return false;
});

JS;
$this->registerJs($script);

?>