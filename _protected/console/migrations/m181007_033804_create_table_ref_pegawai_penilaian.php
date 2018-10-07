<?php

use yii\db\Migration;

class m181007_033804_create_table_ref_pegawai_penilaian extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_pegawai_penilaian}}', [
            'id' => $this->primaryKey(),
            'nip' => $this->string()->notNull(),
            'nama' => $this->string()->notNull(),
            'jabatan' => $this->string(),
            'unit' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'telepon' => $this->string()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'dinilai' => $this->string(),
        ], $tableOptions);

        $this->createIndex('nip', '{{%ref_pegawai_penilaian}}', 'nip', true);
    }

    public function down()
    {
        $this->dropTable('{{%ref_pegawai_penilaian}}');
    }
}
