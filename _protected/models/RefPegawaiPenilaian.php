<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ref_pegawai_penilaian".
 *
 * @property int $id
 * @property string $nip
 * @property string $nama
 * @property string $jabatan
 * @property string $unit
 * @property string $email
 * @property string $telepon
 * @property int $created_at
 * @property int $updated_at
 * @property string $dinilai
 */
class RefPegawaiPenilaian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_pegawai_penilaian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'unit', 'email', 'telepon'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['nip'], 'string', 'max' => 30],
            [['nama', 'jabatan', 'unit', 'email', 'telepon', 'dinilai'], 'string', 'max' => 100],
            [['nip'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'nama' => 'Nama',
            'jabatan' => 'Jabatan',
            'unit' => 'Unit',
            'email' => 'Email',
            'telepon' => 'Telepon',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'dinilai' => 'Dinilai',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }    
}
