<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefPegawaiPenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai Peserta SPIP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-pegawai-penilaian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">Formulir Data Peserta</div>
        <div class="panel-body">
            <?php echo $this->render('_form', ['model' => $model]); ?>
        </div>
    </div>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'export' => false, 
        'responsive'=>true,
        'hover'=>true,     
        'resizableColumns'=>true,
        'panel'=>[
            'type'=>'primary', 
            'heading'=>$this->title,
        ],
        'responsiveWrap' => false,        
        'toolbar' => [
            [
                // 'content' => $this->render('_search', ['model' => $searchModel]),
            ],
            '{export}',
            '{toggleData}',
        ],       
        // 'toggleDataContainer' => ['class' => 'btn-group-sm'],
        // 'exportContainer' => ['class' => 'btn-group-sm'],
        'pager' => [
            'firstPageLabel' => 'Awal',
            'lastPageLabel'  => 'Akhir'
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'options' => ['id' => 'sekolah-pjax', 'timeout' => 5000],
        ],        
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'nip',
            'nama',
            'jabatan',
            'namaUnit',
            'email:email',
            'telepon',
            // 'created_at',
            // 'updated_at',
            'dinilai',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
