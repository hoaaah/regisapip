<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "RegistrasiController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class RegistrasiController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\RefPegawaiPenilaian';
}
