<?php

use yii\db\Migration;
	use yii\db\Schema;

	class m161006_210227_sites extends Migration
{
	public function up ()
	{
		$this->createTable ('sites', array(
			'id'         => Schema::TYPE_PK,
			'domain'      => Schema::TYPE_STRING . ' NOT NULL',
			'api_key'    => Schema::TYPE_TEXT,
			'created_at' => Schema::TYPE_DATETIME,
		));
	}

	public function down ()
	{

		echo "m161006_183251_sites cannot be reverted.\n";

		$this->dropTable('sites');
		return false;
	}

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
