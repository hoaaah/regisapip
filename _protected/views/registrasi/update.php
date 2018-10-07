<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefPegawaiPenilaian */

$this->title = 'Update Ref Pegawai Penilaian: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Pegawai Penilaians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-pegawai-penilaian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
